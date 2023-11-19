<?php
session_start();
session_unset();
session_destroy();
header('Location: ../to_do_list-kavan/index.php');
// header('Location: ../pages/login-page.php');
?>