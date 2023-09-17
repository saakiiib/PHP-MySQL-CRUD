<?php
require_once('db_connection.php');

$sql = "SELECT * FROM teachers";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>View Teachers</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>View Teachers</h1>
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
                    echo "<a href='edit_teacher.php?id=" . $row['id'] . "'>Edit</a> | ";
                    echo "<a href='delete_teacher.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this teacher?\")'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No teachers found</td></tr>";
            }
            ?>
        </table>
        <a class="action-button" href="teacher.php">Back to Teachers</a>
        <a class="action-button" href="index.php">Back to Home</a>
    </div>
</body>

</html>