<html>
    <head>
        <title>Sign up</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div class="home">
            <a href="index.php"> <button> <img src="home.png" alt="home" width="60px" height="60px"> </button></a>
        </div> 
        <div class="register-form">
            <p>Sign up</p>
            <form action="includes/register.inc.php" method="post">
                <input type="text" name="email" placeholder="Adresa de email...">
                <input type="password" name="pwd" placeholder="Parola...">
                <input type="password" name="confirm_pwd" placeholder="Confirmati parola...">
                <button type="submit" name="submit">Sign up</button>
            </form>
            <div class="already">
                <p>V-ati creat deja cont?</p>
                <a href="login.php">Log in!</a>
            </div>
            <?php
            if(isset($_GET["error"]))
            {
                if($_GET["error"]== "emptyinput")
                {
                    echo "<script>alert('Va rugam completati toate campurile!');</script>";
                }
                else if($_GET["error"]== "invalidEmail")
                {
                    echo "<script>alert('Email invalid!');</script>";
                }
                else if($_GET["error"]== "passwordsdontmatch")
                {
                    echo "<script>alert('Parolele nu se potrivesc!');</script>";
                }
                else if($_GET["error"]== "stmtFailed")
                {
                    echo "<script>alert('Ceva a esuat. Va rugam incercati din nou!');</script>";
                }
                else if($_GET["error"]== "none")
                {
                    echo "<script>alert('V-ati creat un cont cu succes!');</script>";
                }
            }
        
        ?>
        </div>
        
    </body>
</html>