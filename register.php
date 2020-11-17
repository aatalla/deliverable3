<?php

session_start();

if ($_SESSION['login_status'] == 0)
{
    echo "Please log in or register."
    return;
}

if ($_POST['password'] <> $_POST['confirmpassword'])
{
    echo  "Passwords do not match. Please try again."
    return;
}

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

$sql = "SELECT * FROM USERS WHERE UserEmail = " . $email . ";";
$result = $conn->query($sql);

if ($result->numrows > 0)
{
    echo "A username with that email already exists. Please use another email to register, or login with that email."
    return;
}

$sql_adduser = "INSERT INTO USERS VALUES ('" . $email . "', '" . $password . "', '" . "Customer');";
$result_adduser = $conn->query($sql_adduser);



?>