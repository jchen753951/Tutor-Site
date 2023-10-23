<?php
include 'server.php';

if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['minit']) && isset($_POST['degree'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $first_name = validate($_POST['fname']);
    $last_name = validate($_POST['lname']);
    $middle_initial = validate($_POST['minit']);
    $degree = validate($_POST['degree']);

    if (
        !empty($first_name) &&
        !empty($last_name) &&
        !empty($middle_initial) &&
        !empty($degree)
    ) {
        $sql = "INSERT INTO tutor (FName, MINIT, LName, Degree) VALUES ('$first_name', '$middle_initial', '$last_name', '$degree')";
        $result = mysqli_query($db, $sql);

        if ($result) {
            echo "Tutor information saved successfully!";
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