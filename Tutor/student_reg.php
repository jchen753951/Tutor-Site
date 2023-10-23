<?php
include 'server.php';

if (isset($_POST['fname']) && isset($_POST['minit']) && isset($_POST['lname']) 
&& isset($_POST['satdate']) && isset($_POST['glevel']) && isset($_POST['dob']) 
&& isset($_POST['gfname']) && isset($_POST['gminit']) && isset($_POST['glname'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $first_name = validate($_POST['fname']);
    $middle_initial = validate($_POST['minit']);
    $last_name = validate($_POST['lname']);
    $sat_date = validate($_POST['satdate']);
    $grade_level = validate($_POST['glevel']);
    $dob = validate($_POST['dob']);
    $guardian_first_name = validate($_POST['gfname']);
    $guardian_middle_initial = validate($_POST['gminit']);
    $guardian_last_name = validate($_POST['glname']);

    if (
        !empty($first_name) &&
        !empty($middle_initial) &&
        !empty($last_name) &&
        !empty($sat_date) &&
        !empty($grade_level) &&
        !empty($dob) &&
        !empty($guardian_first_name) &&
        !empty($guardian_middle_initial) &&
        !empty($guardian_last_name)
    ) {
        $sql = "INSERT INTO student (FName, MINIT, LName, SAT_date, Grade, DOB, G_FName, G_Minit, G_LName) VALUES ('$first_name', '$middle_initial', '$last_name', '$sat_date', '$grade_level', '$dob', '$guardian_first_name', '$guardian_middle_initial', '$guardian_last_name')";
        $result = mysqli_query($db, $sql);

        if ($result) {
            echo "Student information saved successfully!";
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