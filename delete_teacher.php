<?php
require_once('db_connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM teachers WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: view_teachers.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid request.";
    exit();
}
