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
    $sql = "update FOOTBALL_MATCH set KickOffDate ='" . $_POST['KickOffDate'] ."', ". "KickOffTime='" . $_POST['KickOffTime'] . "', " . "Team1='" . $_POST['Team1'] . "', " . 
    "Team2='" . $_POST['Team2'] . "', " . "StadiumName='" . $_GET['MatchNumber'] ."' where MatchNumber=" . $_SESSION["MatchNumber"] .";";
    $conn->query($sql);
    echo "Match has been successfully updated.";
?>