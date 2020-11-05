<!-- 

    category drop down

    price: auto filled (text field, cannot be changed)
    seats available: drop down (filled based on category chosen)

    button to pay

    SQL command that filters based on ?id=x

    PAGE REQUIREMENTS:

    After Book now link/button is clicked this should display all the categories with
    the following details
        • Category type
        • Price
        • Seats Available
        • A textbox where the user can enter the number of tickets for each category
    
    There should be a next/submit button to go to the next page but make sure before that
    you did all required validations. For example, you know through research the maximum
    number of tickets one customer can buy. Also make sure that a number was entered and
    that does not exceed the number of available tickets.

 -->

<!DOCTYPE html>

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

$servername = "dbproject5.org";
$username = "myDBUser";
$password = "myDBUserPassword";
$dbname = "Team2X_Project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql_cat1 = "SELECT s.SeatPrice, s.SeatCategory, st.Category1Capacity FROM SEAT s, STADIUM st WHERE s.StadiumName = st.StadiumName AND s.SeatCategory = 1 GROUP BY s.SeatCategory";
$sql_cat2 = "SELECT s.SeatPrice, s.SeatCategory, st.Category2Capacity FROM SEAT s, STADIUM st WHERE s.StadiumName = st.StadiumName AND s.SeatCategory = 2 GROUP BY s.SeatCategory";
$sql_cat3 = "SELECT s.SeatPrice, s.SeatCategory, st.Category3Capacity FROM SEAT s, STADIUM st WHERE s.StadiumName = st.StadiumName AND s.SeatCategory = 3 GROUP BY s.SeatCategory";
$sql_cat4 = "SELECT s.SeatPrice, s.SeatCategory, st.Category4Capacity FROM SEAT s, STADIUM st WHERE s.StadiumName = st.StadiumName AND s.SeatCategory = 4 GROUP BY s.SeatCategory";

$result_cat1 = $conn->query($sql_cat1);
$result_cat2 = $conn->query($sql_cat2);
$result_cat3 = $conn->query($sql_cat3);
$result_cat4 = $conn->query($sql_cat4);

if ($result_cat1->num_rows > 0 && $result_cat2->num_rows > 0 && $result_cat3->num_rows > 0 && $result_cat4->num_rows > 0) {
  echo "<form action='insert_ticket_info.php?matchnum=" . $_GET['matchnum'] . "' method='post'><table width=75% border='1'><tr>
                   <td>Category</td>
                   <td>Price</td>
                   <td>Available Seats</td></tr>";
  // output data of each row
  while($row = $result_cat1->fetch_assoc()) {
    echo "<tr><td>" . $row['SeatCategory'] . "</td>" .
         "<td>".$row["SeatPrice"] . "</td>" .
         "<td>".$row["Category1Capacity"] . "</td>" . 
         "<td> <input type='number' name='cat1amount' id='cat1amount' value='0' min='0' max='4'> </td></tr>";
  }
  while($row = $result_cat2->fetch_assoc()) {
    echo "<tr><td>" . $row['SeatCategory'] . "</td>" .
         "<td>".$row["SeatPrice"] . "</td>" .
         "<td>".$row["Category2Capacity"] . "</td>" . 
         "<td> <input type='number' name='cat2amount' id='cat2amount' value='0' min='0' max='4'> </td></tr>";
  }
  while($row = $result_cat3->fetch_assoc()) {
    echo "<tr><td>" . $row['SeatCategory'] . "</td>" .
         "<td>".$row["SeatPrice"] . "</td>" .
         "<td>".$row["Category3Capacity"] . "</td>" . 
         "<td> <input type='number' name='cat3amount' id='cat3amount' value='0' min='0' max='4'> </td></tr>";
  }
  while($row = $result_cat4->fetch_assoc()) {
    echo "<tr><td>" . $row['SeatCategory'] . "</td>" .
         "<td>".$row["SeatPrice"] . "</td>" .
         "<td>".$row["Category4Capacity"] . "</td>" . 
         "<td> <input type='number' name='cat4amount' id='cat4amount' value='0' min='0' max='4'> </td></tr>";
  }
  echo "</table><br><input type='submit' value='Next'></form>";
} else {
  echo "There are no seats currently.";
}

$conn->close();

?>

<!-- Copyright section -->
<footer class="footer">
    <hr>
    <p>Copyright Team 2X</p>
</footer>

</html>