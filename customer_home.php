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
<title> Worldcup 2022 - Homepage </title>
</head>

<body>

<p style="text-align: center; font-size: 36px;"> <b>World Cup 2022 Booking Website</b> </p>

<button class="buttons"><a href="logout.php">Log Out</a></button>

<hr>

<?php 
    session_start();
    if(!isset($_SESSION["login_status"]) || $_SESSION["login_status"] <> 1){
        header("location: home.html");
        return;
    }

?>

<!-- Aligning the buttons, and making them clickable -->
<div class="center">
    <button class="buttons"><a href="customer_home.html">Home</a></button>

    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <button class="buttons"><a href="book.html">Match Booking</a></button>

    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <button class="buttons"><a href="purchases.php">Purchases</a></button>
</div>

</body>

<!-- Copyright section -->
<footer class="footer">
    <hr>
    <p>Copyright Team 2X</p>
</footer>

</html>