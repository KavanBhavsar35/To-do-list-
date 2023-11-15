<?php
session_start();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else {
    $user = array();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <title>To Do List</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/download.png">
</head>

<body>
    <nav>
        <h1><a href="https://github.com/JatinKevlani/to_do_list.git" target="_blank">To Do List - JatinKevlani</a></h1>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="pages/about.html" target="_blank">About</a></li>
            <li><a href="pages/contact.html" target="_blank">Contact</a></li>
            <?php
            if (empty($user[1])) {
                echo "
                        <li><a href='pages/login-page.php'>Login</a></li>
                        <li><a href='pages/signup-page.php'>Sign Up</a></li>
                    ";
            } else {
                echo "
                        <li>Hello, {$user[1]}</li>
                        <li><a href='backend/logout.php'>Logout</a></li>
                    ";
            }
            ?>
        </ul>
    </nav>
    <main>
        <div class="container">
            <table border="1px">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="tableBody"></tbody>
            </table>
            <div id="input"></div>
            <br>
            <button class="btn" id="add">Add</button>
            <button class="btn" id="deleteAll">Delete All</button>
        </div>
        <?php
        if (empty($user[1])) {
            echo "
                    <div class='signinMsg'>
                        Login to use server based application.
                    </div>
                ";
        }
        ?>
    </main>
    <?php
    if (empty($user[1])) {
        echo "
                <script src='script/localscript.js'></script>
            ";
    }
    ?>
    <?php
    if (isset($_SESSION['first_login'])) {
        if ($_SESSION['first_login']) {
            echo "
                    <script>alert('You have been successfully registered!');</script>
                ";
            $_SESSION['first_login'] = false;
        }
    }
    ?>
</body>

</html>