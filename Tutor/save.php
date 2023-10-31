<?php
include 'server.php';

if (isset($_POST['name']) && isset($_POST['id'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = validate($_POST['name']);
    $id = validate($_POST['id']);

    if (empty($id) || empty($name)) {
        echo "Both name and id are required!";
    } else {
        $sql = "INSERT INTO test (name, id) VALUES ('$name', '$id')";
        $res = mysqli_query($db, $sql);

        if ($res) {
            echo "Your message was sent successfully! <a href='index.html'>Go back to index</a>";
        } else {
            echo "Your message could not be sent!";
        }
    }
} else {
    header("Location: index.html");
}
?>