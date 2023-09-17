<?php
require_once('db_connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM students WHERE id='$id'";

    if ($conn->query($sql)) {
        header("Location: view_students.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Student ID not provided.";
}
