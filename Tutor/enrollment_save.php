<?php
include 'server.php';

if (
    isset($_POST['sid']) &&
    isset($_POST['start-time']) &&
    isset($_POST['duration']) &&
    isset($_POST['subject']) &&
    isset($_POST['date']) &&
    isset($_POST['tid']) &&
    isset($_POST['homework-space']) &&
    isset($_POST['comments-space']) &&
    isset($_POST['behavior']) &&
    isset($_POST['motivation']) &&
    isset($_POST['focus'])
) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $student_id = validate($_POST['sid']);
    $session_id = validate($_POST['start-time']);
    $duration = validate($_POST['duration']);
    $subject = validate($_POST['subject']);
    $date = validate($_POST['date']);
    $tutor_id = validate($_POST['tid']);
    $homework = validate($_POST['homework-space']);
    $comments = validate($_POST['comments-space']);
    $behavior = validate($_POST['behavior']);
    $motivation = validate($_POST['motivation']);
    $focus = validate($_POST['focus']);

    if (
        !empty($student_id) &&
        !empty($session_id) &&
        !empty($duration) &&
        !empty($subject) &&
        !empty($date) &&
        !empty($tutor_id) &&
        !empty($homework) &&
        !empty($comments) &&
        !empty($behavior) &&
        !empty($motivation) &&
        !empty($focus)
    ) {

        // Use prepared statements to insert data into the 'session' table
        $sessionSql = "INSERT INTO session (Session_ID, Start_Time, Length, Subject, Date, T_ID) VALUES (?, ?, ?, ?, ?, ?)";
        $sessionStmt = mysqli_prepare($db, $sessionSql);
        mysqli_stmt_bind_param($sessionStmt, "ssisii", $session_id, $start_time, $duration, $subject, $formattedDate, $tutor_id);
        $sessionResult = mysqli_stmt_execute($sessionStmt);

        // Use prepared statements to insert data into the 'enrollment' table
        $enrollmentSql = "INSERT INTO enrollment (S_ID, Session_ID, Homework, Comments, Behavior, Motivation, Confidence, Focus) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $enrollmentStmt = mysqli_prepare($db, $enrollmentSql);
        mysqli_stmt_bind_param($enrollmentStmt, "ssssssss", $student_id, $session_id, $homework, $comments, $behavior, $motivation, $confidence, $focus);
        $enrollmentResult = mysqli_stmt_execute($enrollmentStmt);

        if ($sessionResult && $enrollmentResult) {
            echo "Enrollment data saved successfully!";
        } else {
            echo "Error: " . mysqli_error($db);
        }
    } else {
        echo "Please fill in all the required fields.";
    }
} else {
    echo "Invalid request or missing fields.";
}
?>
