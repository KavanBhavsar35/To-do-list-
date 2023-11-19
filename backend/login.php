<?php
session_start();
if ($_POST) {
    include('database/connection.php');
    $username = $_POST['userName'];
    $password = $_POST['userPswd'];
    $query = "SELECT * FROM users WHERE user_name='$username' AND user_password='$password'";
    $result = $conn->query($query);
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
    if ($result->num_rows > 0) {
        $user = $result->fetch_all()[0];
        $_SESSION['user'] = $user;
        $conn->close();
        header('Location: ../to_do_list-kavan/index.php');
    } else {
        $_SESSION['error_message'] = true;
        header('Location: ../to_do_list-kavan/index.php');
    }
    $conn->close();
}
?>