<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        p {
            margin: 0;
            padding-bottom: 8px;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
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

            echo "<h2>Student Information</h2>";
            echo "<p><strong>First Name:</strong> " . $firstName . "</p>";
            echo "<p><strong>Last Name:</strong> " . $lastName . "</p>";
            echo "<p><strong>Student ID:</strong> " . $studentID . "</p>";
            echo "<p><a href='index.html'>Go back to Home</a></p>";

        } else {
            echo "<p>Invalid request or missing fields.</p>";
        }
        ?>
    </div>
</body>
</html>
