<?php
require_once('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    $sql = "INSERT INTO students (name, email, mobile) VALUES ('$name', '$email', '$mobile')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New student added successfully');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Student</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>Add Student</h1>
        <form method="post">
            <label for="name">Name:</label>
            <input type="text" name="name" required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" required><br>

            <label for="mobile">Mobile:</label>
            <input type="text" name="mobile" required><br>

            <input type="submit" value="Add Student">
        </form>
        <a class="action-button" href="view_students.php">View Students</a>
        <a class="action-button" href="student.php">Back to Students</a>
        <a class="action-button" href="index.php">Back to Home</a>
    </div>
</body>

</html>