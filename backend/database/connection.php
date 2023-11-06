<?php
$server_name = 'localhost'; // Your server name here.
$username = 'root'; // Your user name here.
$password = ''; // Your password here.
$database_name = 'to_do'; // Your databse name here.
// Connecting to database.
try {
    $conn = mysqli_connect($server_name, $username, $password, $database_name);
    // echo "Connenction Successfull!";
} catch (\Exception $e) {
    $error_message = $e->getMessage();
}
?>