<?php

session_start();
$_SESSION["login_status"] = 0;
$_SESSION["email"] = "";
header("location: home.html");

?>