<?php
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION["admin_login_status"]) || $_SESSION["admin_login_status"] <> 1){
    header("location: ../login_page.html");
    return;

}    
    include('admin_home.php');
    $servername = "dbproject5.org";
    $username = "Team2X_admin";
    $password = "Team2X_admin";
    $dbname = "Team2X_Project";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "update Stadium set Capacity1Category =" . $_POST['Capacity1Category'] .", ". "Capacity2Category=" . $_POST['Capacity2Category'] . ",'" . "StadiumName='" . $_POST['StadiumName'] . "'," . 
    "StadiumAddress='" . $_POST['StadiumAddress'] . "', " . "StadiumAddress='" . $_POST['StadiumAddress'] . "," .  "Capacity3Category=" . $_POST['Capacity3Category'] . "," .  "Capacity4Category=" . $_POST['Capacity4Category']. "' where StadiumName=" . $_POST["StadiumName"] .";";
    echo $sql;
    // $conn->query($sql);
    echo "Match has been successfully updated.";
?>