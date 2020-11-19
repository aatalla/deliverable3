<?php
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION["admin_login_status"]) || $_SESSION["admin_login_status"] <> 1){
    header("location: login_page.html");
    return;
}
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