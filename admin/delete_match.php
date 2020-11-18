<?php
    include('hw3.php');
    $servername = "dbproject17.org";
    $username = "myDBUser";
    $password = "myDBUserPassword";
    $dbname = "football_aatalla";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "delete from Mat where matchnumber=" . "'" . $_GET["id"] . "'";
    $conn->query($sql);
    echo "Match has been deleted.";
?>