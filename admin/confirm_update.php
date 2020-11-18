<?php
    session_start();
    include('hw3.php');
    $servername = "dbproject17.org";
    $username = "myDBUser";
    $password = "myDBUserPassword";
    $dbname = "football_aatalla";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "update Mat set matchdate ='" . $_POST['matchdate'] ."', ". "matchtime='" . $_POST['matchtime'] . "', " . "team1='" . $_POST['team1'] . "', " . 
    "team2='" . $_POST['team2'] . "', " . "stadiumname='" . $_POST['stadium_selection'] ."' where matchnumber=" . $_SESSION["id"] .";";
    $conn->query($sql);
    echo "Match has been successfully updated.";
    session_destroy();
?>