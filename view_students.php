<?php
require_once('db_connection.php');

$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>View Students</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>View Students</h1>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Action</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['mobile'] . "</td>";
                    echo "<td>";
                    echo "<a href='edit_student.php?id=" . $row['id'] . "'>Edit</a> | ";
                    echo "<a href='delete_student.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this student?\")'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No students found</td></tr>";
            }
            ?>
        </table>
        <a class="action-button" href="student.php">Back to Students</a>
        <a class="action-button" href="index.php">Back to Home</a>
    </div>
</body>

</html>