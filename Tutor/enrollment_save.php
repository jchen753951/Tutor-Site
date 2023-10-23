<?php
include 'server.php';

if (isset($_POST['sid']) && isset($_POST['start-time']) && isset($_POST['homework-space']) && isset($_POST['comments-space']) && isset($_POST['behavior']) && isset($_POST['motivation']) && isset($_POST['focus'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $student_id = validate($_POST['sid']);
    $session_id = validate($_POST['start-time']);
    $homework = validate($_POST['homework-space']);
    $comments = validate($_POST['comments-space']);
    $behavior = validate($_POST['behavior']);
    $motivation = validate($_POST['motivation']);
    $focus = validate($_POST['focus']);

    if (
        !empty($student_id) &&
        !empty($session_id) &&
        !empty($homework) &&
        !empty($comments) &&
        !empty($behavior) &&
        !empty($motivation) &&
        !empty($focus)
    ) {
        $sql = "INSERT INTO enrollment (S_ID, Session_ID, Homework, Comments, Behavior, Motivation, Focus) VALUES ('$student_id', '$session_id', '$homework', '$comments', '$behavior', '$motivation', '$focus')";
        $result = mysqli_query($db, $sql);

        if ($result) {
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