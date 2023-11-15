<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>singup</title>
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/f28d00d089.js" crossorigin="anonymous"></script>
    <!-- google font -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap');
    </style>
    <!-- Custom Styles -->
    <link rel="stylesheet" href="../css/style-singup.css">
</head>

<body>
    <div class="container">
        <h1 class="title-h1">Create <br> Account</h1>
        <form>
            <div class="input-box">
                <i class="fas fa-user"></i>
                <input id="username" class="name" type="text" name="username" placeholder=" Enter your username" />
                <i class="fas fa-envelope"></i>
                <input id="useremail" class="email" type="email" name="email" placeholder="Enter your email" id="email" />
                <i class="fas fa-lock"></i>
                <input id="userpassword" class="password" type="password" name="password" placeholder="Create your password" />
            </div>
            <h3 class="title-h3">Sign up</h3>
            <button class="btn" id="submitBtn"><i class="fas fa-arrow-right"></i></button>
        </form>
        <div style="display: none;">
            <form action="../backend/signup.php" method="post" id="registerForm">
                <input id="userName" type="text" name="username" placeholder=" Enter your username" />
                <input id="userEmail" type="email" name="email" placeholder="Enter your email" id="email" />
                <input id="userPassword" type="password" name="password" placeholder="Create your password" />
            </form>
        </div>
        <?php
        if (isset($_SESSION['same_name'])) {
            if ($_SESSION['same_name'] == true) {
                echo "
                    <script>alert('This username is already taken choose another username.');</script>
                ";
                $_SESSION['same_name'] = false;
            }
        }
        ?>
        <h5 class="title-h5">singup or <a href="login-page.php">login</a></h5>
    </div>
    <div id="resultCont"></div>
    <div id="detailsDiv"></div>
    <script src="../script/evalidate.js"></script>
</body>

</html>