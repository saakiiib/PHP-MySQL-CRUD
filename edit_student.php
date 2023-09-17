<?php
require_once('db_connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM students WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Student not found.";
    }
} else {
    echo "Student ID not provided.";
}

if (isset($_POST['btnUpdate'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    $sql = "UPDATE students SET name='$name', email='$email', mobile='$mobile' WHERE id='$id'";

    if ($conn->query($sql)) {
        header("Location: view_students.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Student</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>Edit Student</h1>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="name">Name:</label>
            <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>

            <label for="mobile">Mobile:</label>
            <input type="text" name="mobile" value="<?php echo $row['mobile']; ?>" required><br>

            <input type="submit" name="btnUpdate" value="Update">
        </form>
        <a class="action-button" href="view_students.php">Back to View Students</a>
        <a class="action-button" href="student.php">Back to Students</a>
        <a class="action-button" href="index.php">Back to Home</a>
    </div>
</body>

</html>