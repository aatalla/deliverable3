<?php

$_SESSION["login_status"] = 0;
session_destroy();

header("location: home.html");

?>