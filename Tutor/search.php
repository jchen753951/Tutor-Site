<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (isset($_POST['enterfname'])) {
        $firstName = validate($_POST['enterfname']);
    } else {
        $firstName = "";
    }

    if (isset($_POST['enterlname'])) {
        $lastName = validate($_POST['enterlname']);
    } else {
        $lastName = "";
    }

    $db = mysqli_connect('localhost', 'root', '', 'c2education');

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT S_ID FROM student WHERE FName = '$firstName' AND LName = '$lastName'";
    $result = mysqli_query($db, $sql);

    if ($result) {
        if ($row = mysqli_fetch_assoc($result)) {
            $studentID = $row['S_ID'];
        } else {
            $studentID = "Student not found";
        }
    } else {
        $studentID = "Error: " . mysqli_error($db);
    }

    mysqli_close($db);

    echo "First Name: " . $firstName . "<br>";
    echo "Last Name: " . $lastName . "<br>";
    echo "Student ID: " . $studentID . "<br><a href='index.html'>Go back to Home</a>";

} else {
    echo "Invalid request or missing fields.";
}
?>
