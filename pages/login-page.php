
<!DOCTYPE html>
<html lang="en">
<head>
    <title>login</title>
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/f28d00d089.js" crossorigin="anonymous"></script>
    <!-- google font -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap');
    </style>
    <!-- Custom Styles -->
    <link rel="stylesheet" href="../css/style-login.css">
</head>
<body>
    <div class="container">
        <h1 class="title-h1">Login</h1>
        <!-- <form action="login-page.php" method="post"> -->
        <form action="../backend/login.php" method="post">
            <i class="fas fa-envelope"></i>
            <div class="input-box">
                <input class="email" type="text" name="username" placeholder="Enter your username" />
                <i class="fas fa-lock"></i>
                <input class="password" type="password" name="password" placeholder="Enter your password" />
            </div>
            
            <?php 
                session_start(); 
                if(!empty($_SESSION['message'])){
                    echo "
                        <div class='errorMessage'>
                            <h3> {$_SESSION['message']} </h1>
                        </div>
                    ";
                    $_SESSION['message'] = ''; 
                }
             ?>
            <h3 class="title-h3">Login</h3>
            <button class="btn" type="submit"><i class="fas fa-arrow-right"></i></button>
        </form>
        <h5 class="title-h5">Login or <a href="signup-page.php">Sign up</a></h5>
    </div>
</body>
</html>