<?php
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION["admin_login_status"]) || $_SESSION["admin_login_status"] <> 1){
    header("location: ../login_page.html");
    return;

}
?>
<html>

<style>
    html{
        color: white;
        background-color: #8a1538;
	    font-family: 'Quicksand', sans-serif;
    }
    
    /* button styles */
    .buttons {
        color: white;
        font-size: 24px;
        border-radius: 8px;
        font-family: 'Quicksand', sans-serif;
    }

    /* shadow effect on button hover */
    .buttons:hover {
        box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
    }
    ul {
    width: 100%;
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #8a1538;
    }

    li {
    float: left;
    }

    li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px; 
    text-decoration: none;
    }

    li a:hover:not(.active) {
    background-color: white;
    border-radius: 15px;
    color: #e2b33a;
    }
    
    table,td,th{
        text-align:center; 
        border: 1px white solid;
        border-collapse: collapse;
        border-radius: 15px;
        padding: 5px;
    }

</style>
<link href="https://fonts.googleapis.com/css?family=Quicksand&amp;display=swap" rel="stylesheet">
<head>
<title> Admin Privileges </title>
</head>
<body>
<div style="width:100%;">
    <p style="text-align: right;">
        Copyright: Team 2X
    </p>
</div>
<h1 style="width: 100%; text-align:center;">Admin Priveleges</h1>
<ul>
  <li><a href="new_match.php">Add New Match</a></li>
  <li><a href="new_venue.php">Add New Venue</a></li>
  <li><a href="new_team.php">Add New Team</a></li>
  <li><a href="list_match.php">List Matches</a></li>
  <li><a href="list_venue.php">List Venues</a></li>
  <li><a href="list_ticket.php">List Tickets</a></li> 
  <li><a href="">List Teams</a></li> <!-- to be completed -->
  <li><a href="">List Customers</a></li> <!-- to be completed -->
  <li style="float:right"><a href="../logout.php">Log Out</a></li>
</ul>
<hr>
<br>
<br>
</body>

<!-- Copyright section -->
</html>
