<?php
//Will update the database if the student already has a book. Will not duplicate book assignment.
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
        $checkSql = "SELECT * FROM book WHERE S_ID = '$student_id' AND type = '$book_type'";
        $checkResult = mysqli_query($db, $checkSql);

        if (mysqli_num_rows($checkResult) > 0) {
            $updateSql = "UPDATE book SET color = '$book_color' WHERE S_ID = '$student_id' AND type = '$book_type'";
            $updateResult = mysqli_query($db, $updateSql);

            if ($updateResult) {
                echo "Book color updated successfully!";
            } else {
                echo "Error updating book color: " . mysqli_error($db);
            }
        } else {
            $insertSql = "INSERT INTO book (S_ID, type, color) VALUES ('$student_id', '$book_type', '$book_color')";
            $insertResult = mysqli_query($db, $insertSql);

            if ($insertResult) {
                echo "Book assignment saved successfully!";
            } else {
                echo "Error inserting book assignment: " . mysqli_error($db);
            }
        }
    }
} else {
    echo "Invalid request or missing fields.";
}
?>
