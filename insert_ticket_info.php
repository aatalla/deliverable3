<!DOCTYPE html>

<html>

<style>

    /* footer (copyright) style */
    .footer {
        position: relative;
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
<title> Worldcup 2022 - Seat Booking </title>
</head>

<body>

<p style="text-align: center; font-size: 36px;"> <b>World Cup 2022 Seat Booking</b> </p>

<hr>

<!-- Aligning the buttons, and making them clickable -->
<div class="center">
    <button class="buttons"><a href="home.html">Home</a></button>
    <br>
    <br>
    <br>
</div>

</body>

<?php
    session_start();
    $count = 1;
    $sumOfTickets = $_POST['cat1amount'] + $_POST['cat2amount'] + $_POST['cat3amount'] + $_POST['cat4amount'];

    $_SESSION["total_price"] = $_POST['cat1amount'] * 400 + $_POST['cat2amount'] * 300 + $_POST['cat3amount'] * 200 + $_POST['cat4amount'] * 100;
    $_SESSION["numberOfTickets"] = $sumOfTickets;

    echo "<form action='confirmation.php?matchnum=" . $_GET['matchnum'] . "' method='post'>";

    while ($count < $sumOfTickets + 1)
    {

        echo "<h1>" . "Ticket " . $count . " Details</h1>";

        echo "<label>Category:</label><br>
              <input type='text' name='Category_Ticket" . $count . "' value='1' readonly><br>";

        echo "<label>Guest?</label><br>
              <input type='radio' name='Guest_Ticket" . $count . "' id='yes'>
              <label for='yes'>Yes</label>
              <input type='radio' name='Guest_Ticket" . $count . "' id='no'>
              <label for='no'>No</label><br>";
        
        echo "<label>FanID:</label><br>
              <input type='number' name='CustFanID_Ticket" . $count . "' required><br>";

        echo "<label>First name:</label><br>
              <input type='text' name='CustFName_Ticket" . $count . "' required><br>";

        echo "<label>Last name:</label><br>
              <input type='text' name='CustLName_Ticket" . $count . "' required><br>";

        echo "<label>Date of Birth:</label><br>
              <input type='date' name='CustDOB_Ticket" . $count . "' required><br>";

        echo "<label>Nationality:</label><br>
              <input type='text' name='CustNationality_Ticket" . $count . "' required><br>";
        
        echo "<label>Address:</label><br>
              <input type='text' name='CustAddress_Ticket" . $count . "' required><br>";
        
        echo "<label>Telephone Number:</label><br>
              <input type='number' name='CustTel_Ticket" . $count . "' required><br>";
      
        echo "<label>Email:</label><br>
              <input type='text' name='CustEmail_Ticket" . $count . "' required><br>";

        echo "<br>";

        $count = $count + 1;

    }

    echo "<input type='submit' value='Pay Now'></form>";
    echo "<br><br><br>"
?>

<!-- Copyright section -->
<footer class="footer">
    <hr>
    <p>Copyright Team 2X</p>
</footer>

</html>