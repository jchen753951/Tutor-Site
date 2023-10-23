<?php
include 'server.php';

if (isset($_POST['sid']) && isset($_POST['booktype']) && isset($_POST['bookcolor'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $student_id = validate($_POST['sid']);
    $book_type = validate($_POST['booktype']);
    $book_color = validate($_POST['bookcolor']);

    if (empty($student_id) || empty($book_type) || empty($book_color)) {
        echo "Please fill in all the required fields.";
    } else {
        $sql = "INSERT INTO book (S_ID, type, color) VALUES ('$student_id', '$book_type', '$book_color')";
        $res = mysqli_query($db, $sql);

        if ($res) {
            echo "Book assignment saved successfully!";
        } else {
            echo "Error: " . mysqli_error($db);
        }
    }
} else {
    echo "Invalid request or missing fields.";
}
?>
