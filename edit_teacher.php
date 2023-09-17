<?php
require_once('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    $sql = "UPDATE teachers SET name='$name', email='$email', mobile='$mobile' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: view_teachers.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM teachers WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $email = $row['email'];
        $mobile = $row['mobile'];
    } else {
        echo "Teacher not found.";
        exit();
    }
} else {
    echo "Invalid request.";
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Teacher</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>Edit Teacher</h1>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="name">Name:</label>
            <input type="text" name="name" value="<?php echo $name; ?>" required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $email; ?>" required><br>

            <label for="mobile">Mobile:</label>
            <input type="text" name="mobile" value="<?php echo $mobile; ?>" required><br>

            <input type="submit" value="Update Teacher">
        </form>
        <a class="action-button" href="view_teachers.php">Back to View Teachers</a>
        <a class="action-button" href="teacher.php">Back to Teachers</a>
        <a class="action-button" href="index.php">Back to Home</a>
    </div>
</body>

</html>