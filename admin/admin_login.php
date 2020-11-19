<!DOCTYPE html>

<html>

<style>

    /* footer (copyright) style */
    .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        text-align: center;
    }

    /* button styles */
    .buttons {
        color: white;
        font-size: 24px;
        border-radius: 8px;
    }

    /* shadow effect on button hover */
    .buttons:hover {
        box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
    }

    /* aligns the buttons to the center */
    .center {
        text-align: center;
    }

</style>

<head>
<title> Worldcup 2022 - Register </title>
</head>

<body>

<p style="text-align: center; font-size: 36px;"> <b>World Cup 2022 Register</b> </p>

<hr>

<!-- Aligning the buttons, and making them clickable -->
<div class="center">
    <button class="buttons"><a href="home.html">Home</a></button>
    <br>
    <br>
    <br>
</div>

</body>

<?php

session_start();
$_SESSION["admin_login_status"] = 0;

$servername = "dbproject5.org";
$username = "Team2X_admin";
$password = "Team2X_admin";
$dbname = "Team2X_Project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['admin_email'];
$password = $_POST['admin_password'];

$login = "SELECT * FROM USERS WHERE UserEmail ='" . $email . "'" . "and UserPassword='" . $password ."' and UserRole ='Admin';";
$result = $conn->query($login);
if ($result->num_rows > 0){
    $_SESSION["admin_login_status"] = 1;
    header("location: admin_home.php");
}
else{
    echo "Username and Password don't match.";
}

?>

<!-- Copyright section -->
<footer class="footer">
    <hr>
    <p>Copyright Team 2X</p>
</footer>

</html>