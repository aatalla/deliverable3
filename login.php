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

$login = "SELECT UserEmail, UserPassword password FROM USER WHERE UserEmail ='" . $email . "'" . "and UserPassword='" . $password ."';";
$result = $conn->query($login);
if ($result->num_rows > 0){
    $_SESSION["login_start"] = 1;
    header("Location: http://dbproject17.org/deliverable3/customer_home.php/");
}