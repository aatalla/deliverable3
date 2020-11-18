<?php

session_start();
$_SESSION["admin_login_status"] = 0;
header("location: admin_login_page.html");

?>