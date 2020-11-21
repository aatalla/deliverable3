<html>

<style>

    /* button styles */
    .buttons {
        color: white;
        font-size: 24px;
        border-radius: 8px;
    }

    /* shadow effect on button hover */
    .buttons:hover {
        box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
    }

    /* aligns the buttons to the center */
    .center {
        text-align: center;
    }

</style>
<head>
<title> Admin Privileges </title>
</head>
<p style="display:block; width:100%;">
    Copyright: Team 2X
</p>
<body>
<h1 style="text-align:center;">Admin Priveleges</h1>

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
