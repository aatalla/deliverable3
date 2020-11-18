<?php

session_start();
$_SESSION["login_status"] = 0;

$servername = "dbproject5.org";
$username = "Team2X_customer";
$password = "Team2X_customer";
$dbname = "Team2X_Project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$login = "SELECT UserEmail, UserPassword FROM USERS WHERE UserEmail ='" . $email . "'" . "and UserPassword='" . $password ."';";
$result = $conn->query($login);
if ($result->num_rows > 0){
    $_SESSION["login_status"] = 1;
    $_SESSION["email"] = $email;
    header("location: customer_home.php");
}
else{
    echo "Username and Password don't match.";
}