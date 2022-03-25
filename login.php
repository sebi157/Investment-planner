<?php
session_start();
?>
<html>
    <head>
        <title>Login</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div class="home">
            <a href="index.php"> <button> <img src="home.png" alt="home" width="60px" height="60px"> </button></a>
        </div>
        <div class="register-form">
            <p>Log In</p>
            <form action="includes/login.inc.php" method="post">
                <input type="text" name="email" placeholder="Email...">
                <input type="password" name="pwd" placeholder="Parola...">
                <button type="submit" name="Submit">Log in</button>
            </form>
            <div class="already">
                <p>Nu aveti cont?</p>
                <a href="register.php">Sign up!</a>
            </div>
            <?php
            if(isset($_GET["error"]))
            {
                if($_GET["error"]== "emptyinput")
                {
                    echo '<script>alert("Va rugam completati toate campurile!")</script>';
                }
                else if($_GET["error"]== "wronglogin")
                {
                    echo '<script>alert("Parola gresita!")</script>';
                }
            }
            ?>
        </div>
    </body>
</html>