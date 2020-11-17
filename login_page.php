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
<?php
session_start();
$_SESSION["login_status"] = 0;
?>
<html>
    <body>
        <p style="text-align: center; font-size: 36px;"> <b>World Cup 2022 Seat Booking</b> </p>

        <hr>
        <div class="center">
            <button class="buttons"><a href="home.html">Home</a></button>
            <br>
            <br>
            <br>
        </div>
        <div class="center">
        <form action="login.php" method="post">
            <label>Email: </label>
            <input type="email">
            <br>
            <br>
            <label>Password: </label>
            <input type="text">
            <br>
            <br>
            <input type="submit" value="Login">
        </form>

        <!-- Copyright section -->
        <footer class="footer">
            <hr>
            <p>Copyright Team 2X</p>
        </footer>
    <body>
</html>