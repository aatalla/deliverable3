<html>

<style>
    html{
        color: black;
        background-color: #800000;
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

    /* aligns the buttons to the center */
    .center {
        width: auto;
        text-align: center;
    }

    ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
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
    background-color: #111;
    }

    .active {
    background-color: #4CAF50;
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
  <li><a href="#home">Home</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#contact">Contact</a></li>
  <li style="float:right"><a class="active" href="#about">About</a></li>
</ul>
<button class="buttons"><a href="../logout.php">Log Out</a></button>

<hr>

<?php
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION["admin_login_status"]) || $_SESSION["admin_login_status"] <> 1){
    header("location: ../login_page.html");
    return;

}
?>
<!-- Aligning the buttons, and making them clickable -->
<div class="center">
    <button class="buttons"><a href = "new_match.php">Add New Match</a></button>

    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <button class="buttons"><a href="new_venue.php">Add New Venue</a></button>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <button class="buttons"><a href="new_team.php">Add New Team</a></button>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


    <br>
    <br>

    <button class="buttons"><a href="list_match.php">List Matches</a></button>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <button class="buttons"><a href="list_venue.php">List Venues</a></button>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <button class="buttons"><a href="purchases.php">List Teams</a></button>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <button class="buttons"><a href="list_ticket.php">List Tickets</a></button>

    
</div>
<br>
<br>
</body>

<!-- Copyright section -->
</html>
