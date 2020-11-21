<?php
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION["admin_login_status"]) || $_SESSION["admin_login_status"] <> 1){
    header("location: ../login_page.html");
    return;

}
include ('admin_home.php');
$TeamName = $_POST["TeamName"];
$servername = "dbproject5.org";
$username = "Team2X_admin";
$password = "Team2X_admin";
$dbname = "Team2X_Project";
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "select TeamName from TEAM where TeamName = '" . $TeamName . "';";
$check_sql = $conn->query($sql);
$exists_row = $check_sql->num_rows;
if($exists_row > 0){
    echo "A team with this name already exists.";
}
else{
    $insert_sql = "insert into TEAM values('" . $_POST["TeamName"] ."');";
    $insert = $conn->query($insert_sql);
    echo "Team added successfully.";
}

?>