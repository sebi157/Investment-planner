<?php
session_start();
if(isset($_SESSION['loggedin'])){
   header("Location:datacolector.php");
}
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password, "prof_calc");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
<html>
<head>
        
<title>Profit Calculator</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <div class="st_page">
        <div class="logo">
            <img src="logo_new3.png" alt="Logo" width="330px" height="115px">
        </div>
        <?php
            include_once 'buttons.php';
        ?>
    </div>
</body>
</html>