<?php
include 'server.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $session_id = uniqid();
    
    $student_id = $_POST['student_id'];
    $start_time = $_POST['start_time'];
    $date = $_POST['date'];
    $tutor_id = $_POST['tutor_id'];
    $duration = $_POST['duration'];
    $subject = $_POST['subject'];
    $confidence = $_POST['confidence'];
    $motivation = $_POST['motivation'];
    $focus = $_POST['focus'];
    $behavior = $_POST['behavior'];
    $assigned_homework = $_POST['assigned_homework'];
    $comments = $_POST['comments'];

    $enrollmentSQL = "INSERT INTO enrollment (S_ID, Session_ID, Homework, Comments, Behavior, Motivation, Confidence, Focus) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt1 = $db->prepare($enrollmentSQL);
    $stmt1->bind_param("iissiiii", $student_id, $session_id, $assigned_homework, $comments, $behavior, $motivation, $confidence, $focus);

    $sessionSQL = "INSERT INTO session (Session_ID, Start_Time, Length, Subject, Date, T_ID) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt2 = $db->prepare($sessionSQL);
    $stmt2->bind_param("issssi", $session_id, $start_time, $duration, $subject, $date, $tutor_id);

    if ($stmt1->execute() && $stmt2->execute()) {
        echo "Data saved successfully! <a href='index.html'>Go back to index</a>";
    } else {
        echo "Error: " . $db->error;
    }

    $stmt1->close();
    $stmt2->close();
} else {
    header("Location: index.html");
}
