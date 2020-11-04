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

<html>
    <title>
        Worldcup 2022 - Seat Booking
    </title>
</html>

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

$sql = "SELECT * FROM CATEGORY";
$result = $conn->query($sql);

// Change values (ex MatchNumber, Team1, etc) to values from the CATEGORY table (CategoryType, Price, SeatsAvailable)
// Instead of a button to "Book," should be changed to a text box (amount of tickets to buy from this specific category)
if ($result->num_rows > 0) {
  echo "<table width=75% border='1'><tr><td>MatchNumber</td>
                   <td>Team1</td>
                   <td>Team2</td>
                   <td>Stadium</td>
                   <td>Date</td>
                   <td>Time</td></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["matchnumber"] . "</td>" .
         "<td>".$row["team1"] . "</td>" .
         "<td>".$row["team2"] . "</td>" . 
         "<td>".$row["name"] . "</td>" .
         "<td>".$row["kickoffdate"] . "</td>" .
         "<td>".$row["kickofftime"] . "</td>" .
         '<td><a href="seat_booking.php?id=' . $row["matchnumber"] . '"style="display:block;">Book</a></td>' . "</td></tr>";
  }
  echo "</table>";
} else {
  echo "There are no seats currently.";
}

$conn->close();

?>