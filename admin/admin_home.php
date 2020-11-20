<!DOCTYPE html>

<!--  

    Home page - done
    match_booking - WIP
    seat_booking - WIP
    ticket_info - WIP
    confirm_order - WIP
    credit card validation (HW1) - WIP
    SUCCESS page - WIP

    Purchases Tab
    List all tickets bought

-->

<html>

<style>

    /* footer (copyright) style */
    .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        text-align: center;
    }

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
<title> Admin Priveleges </title>
</head>

<body>

<p style="text-align: center; font-size: 36px;"> <b>Admin Priveleges</b> </p>

<button class="buttons"><a href="logout.php">Log Out</a></button>

<hr>

<?php
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION["admin_login_status"]) || $_SESSION["admin_login_status"] <> 1){
    header("location: login_page.html");
    return;
}

?>

<!-- Aligning the buttons, and making them clickable -->
<div class="center">
    <button class="buttons"><a href = "new_match.php">Add New Match</a></button>

    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <button class="buttons"><a href="">Add New Venue</a></button>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <button class="buttons"><a href="">Add New Team</a></button>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


    <br>
    <br>

    <button class="buttons"><a href="list_match.php">List Matches</a></button>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <button class="buttons"><a href="purchases.php">List Venues</a></button>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <button class="buttons"><a href="purchases.php">List Teams</a></button>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <button class="buttons"><a href="list_ticket.php">List Tikcets</a></button>
</div>
</div>
<br>
<br>
</body>

<!-- Copyright section -->
<footer class="footer">
    <hr>
    <p>Copyright Team 2X</p>
</footer>