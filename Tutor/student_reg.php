<?php
include 'server.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = $_POST['fname'];
    $minit = $_POST['minit'];
    $lname = $_POST['lname'];
    $satdate = $_POST['satdate'];
    $glevel = $_POST['glevel'];
    $dob = $_POST['dob'];
    $gfname = $_POST['gfname'];
    $gminit = $_POST['gminit'];
    $glname = $_POST['glname'];
    $phone = $_POST['phone'];

    $guardianSQL = "INSERT INTO guardian (FName, MINIT, LName, phone_no, S_ID) VALUES (?, ?, ?, ?, LAST_INSERT_ID())";
    $stmt1 = $db->prepare($guardianSQL);
    $stmt1->bind_param("sssi", $gfname, $gminit, $glname, $phone);

    $studentSQL = "INSERT INTO student (FName, MINIT, LName, SAT_date, Grade, DOB, G_FName, G_Minit, G_LName) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt2 = $db->prepare($studentSQL);
    $stmt2->bind_param("ssssissss", $fname, $minit, $lname, $satdate, $glevel, $dob, $gfname, $gminit, $glname);

    if ($stmt1->execute() && $stmt2->execute()) {
        echo "Student and guardian data saved successfully! <a href='index.html'>Go back to index</a>";
    } else {
        echo "Error: " . $db->error;
    }

    $stmt1->close();
    $stmt2->close();
} else {
    header("Location: index.html");
}
