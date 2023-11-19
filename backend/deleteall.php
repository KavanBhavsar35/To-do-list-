<?php
include('database/connection.php');
session_start();
$user = $_SESSION['user'];
$query = "DELETE FROM $user[1]";
$result = $conn->query($query);
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
header('Location: ../to_do_list-kavan/index.php');
// header('Location: ../index1.php');
?>