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

      if(!isset($_SESSION["login_status"]) || $_SESSION["login_status"] <> 1){
      header("location: home.html");
      return;
      }

    $servername = "dbproject5.org";
    $username = "Team2X_customer";
    $password = "Team2X_customer";
    $dbname = "Team2X_Project";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $count = 1;
    $sumOfTickets = $_POST['cat1amount'] + $_POST['cat2amount'] + $_POST['cat3amount'] + $_POST['cat4amount'];
    
    $cat1price = 0;
    $cat2price = 0;
    $cat3price = 0;
    $cat4price = 0;

    // Calculate Cat1 price
    $sql_cat1price = "SELECT s.SeatPrice FROM SEAT s, STADIUM st WHERE s.StadiumName = st.StadiumName AND s.SeatCategory = 1";
    $result_cat1price = $conn->query($sql_cat1price);

    if ($result_cat1price->num_rows > 0)
    {
        while($row = $result_cat1price->fetch_assoc()) 
        {
            $cat1price = $row['SeatPrice'];
            $_SESSION["cat1price"] = $cat1price;
        }
    }

    // Calculate Cat2 price
    $sql_cat2price = "SELECT s.SeatPrice FROM SEAT s, STADIUM st WHERE s.StadiumName = st.StadiumName AND s.SeatCategory = 2";
    $result_cat2price = $conn->query($sql_cat2price);

    if ($result_cat2price->num_rows > 0)
    {
        while($row = $result_cat2price->fetch_assoc()) 
        {
            $cat2price = $row['SeatPrice'];
            $_SESSION["cat2price"] = $cat2price;
        }
    }

    // Calculate Cat3 price
    $sql_cat3price = "SELECT s.SeatPrice FROM SEAT s, STADIUM st WHERE s.StadiumName = st.StadiumName AND s.SeatCategory = 3";
    $result_cat3price = $conn->query($sql_cat3price);

    if ($result_cat3price->num_rows > 0)
    {
        while($row = $result_cat1price->fetch_assoc()) 
        {
            $cat3price = $row['SeatPrice'];
            $_SESSION["cat3price"] = $cat3price;
        }
    }

    // Calculate Cat4 price
    $sql_cat4price = "SELECT s.SeatPrice FROM SEAT s, STADIUM st WHERE s.StadiumName = st.StadiumName AND s.SeatCategory = 4";
    $result_cat4price = $conn->query($sql_cat4price);

    if ($result_cat4price->num_rows > 0)
    {
        while($row = $result_cat4price->fetch_assoc()) 
        {
            $cat4price = $row['SeatPrice'];
            $_SESSION["cat4price"] = $cat4price;
        }
    }

    $_SESSION["total_price"] = $_POST['cat1amount'] * $cat1price + $_POST['cat2amount'] * $cat2price + $_POST['cat3amount'] * $cat3price + $_POST['cat4amount'] * $cat4price;
    $_SESSION["numberOfTickets"] = $sumOfTickets;
    
    echo "<form action='confirmation.php?matchnum=" . $_GET['matchnum'] . "' method='post'>";

    while ($count < $_POST['cat1amount'] + 1)
    {

        echo "<h1>" . "Ticket " . $count . " Details</h1>";
        echo "<label>Category:</label><br>
              <input type='text' name='Category_Ticket" . $count . "' value='1' readonly><br>";

        echo "<label>Guest?</label><br>
              <select name='Guest_Ticket" . $count . "' required>
              <option> Yes </option>
              <option> No </option>
              </select><br/>";
      
        echo "<label> If yes, enter Customer FanID: </label><br>";
        echo "<input type='text' name='GuestCustFanID_Ticket" . $count . "'><br>";
        
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

    while ($count < $_POST['cat1amount'] + $_POST['cat2amount'] + 1)
    {

        echo "<h1>" . "Ticket " . $count . " Details</h1>";
        echo "<label>Category:</label><br>
              <input type='text' name='Category_Ticket" . $count . "' value='2' readonly><br>";

        echo "<label>Guest?</label><br>
        <select name='Guest_Ticket" . $count . "' required>
        <option> Yes </option>
        <option> No </option>
        </select><br/>";

        echo "<label> If yes, enter Customer FanID: </label><br>";
        echo "<input type='text' name='GuestCustFanID_Ticket" . $count . "'><br>";
        
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

    while ($count < $_POST['cat1amount'] + $_POST['cat2amount'] + $_POST['cat3amount']  + 1)
    {

        echo "<h1>" . "Ticket " . $count . " Details</h1>";
        echo "<label>Category:</label><br>
              <input type='text' name='Category_Ticket" . $count . "' value='3' readonly><br>";

        echo "<label>Guest?</label><br>
        <select name='Guest_Ticket" . $count . "' required>
        <option> Yes </option>
        <option> No </option>
        </select><br/>";

        echo "<label> If yes, enter Customer FanID: </label><br>";
        echo "<input type='text' name='GuestCustFanID_Ticket" . $count . "'><br>";
        
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
    
    while ($count < $_POST['cat1amount'] + $_POST['cat2amount'] + $_POST['cat3amount'] + $_POST['cat4amount'] + 1)
    {

        echo "<h1>" . "Ticket " . $count . " Details</h1>";
        echo "<label>Category:</label><br>
              <input type='text' name='Category_Ticket" . $count . "' value='4' readonly><br>";

        echo "<label>Guest?</label><br>
        <select name='Guest_Ticket" . $count . "' required>
        <option> Yes </option>
        <option> No </option>
        </select><br/>";

        echo "<label> If yes, enter Customer FanID: </label><br>";
        echo "<input type='text' name='GuestCustFanID_Ticket" . $count . "'><br>";
        
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