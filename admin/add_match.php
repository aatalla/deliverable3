<?php
include ('admin_home.php');
$matchnumber = $_POST["matchnumber"];
$servername = "dbproject5.org";
$username = "Team2X_admin";
$password = "Team2X_admin";
$dbname = "Team2X_Project";
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "select matchnumber from Mat where matchnumber = " . $matchnumber;
$check_sql = $conn->query($sql);
$exists_row = $check_sql->num_rows;
if($exists_row > 0){
    echo "A match with this number already exists.";
}
else{
    $insert_sql = "insert into Mat values(" . $_POST["matchnumber"] . ",'" . $_POST["matchdate"] . "','" . $_POST["matchtime"] . "','" . $_POST["team1"] . "','" . $_POST["team2"] . "','" . $_POST["stadium_selection"] . 
    "')";
    
    $insert = $conn->query($insert_sql);
    echo "Match added successfuly.";
}

?>