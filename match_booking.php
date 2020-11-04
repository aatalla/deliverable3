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
<title> Worldcup 2022 - Homepage </title>
</head>

<body>

<p style="text-align: center; font-size: 36px;"> <b>World Cup 2022 Match Booking</b> </p>

<hr>

<!-- Aligning the buttons, and making them clickable -->
<div class="center">
    <button class="buttons"><a href="home.html">Home</a></button>
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

$sql = "SELECT MatchNumber, Team1, Team2, StadiumName, KickOffDate, KickOffTime FROM FOOTBALL_MATCH";
$result = $conn->query($sql);

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
         "<td>".$row["stadiumname"] . "</td>" .
         "<td>".$row["kickoffdate"] . "</td>" .
         "<td>".$row["kickofftime"] . "</td>" .
         '<td><a href="seat_booking.php?id=' . $row["matchnumber"] . '"style="display:block;">Book</a></td>' . "</td></tr>";
  }
  echo "</table>";
} else {
  echo "There are no matches currently.";
}

$conn->close();

?>

<!-- Copyright section -->
<footer class="footer">
    <hr>
    <p>Copyright Team 2X</p>
</footer>

</html>



    <!-- <form action="" method = "POST">
        <select onchange = "">
            <option disabled selected value> -- select an option -- </option>
            /*loop through the php array and display the matches */
        </select>
        /*on changing the match value, we will get the info from the php array and sace it in variable*
        <br>
        <br>
        <label> Match Number </label>
        <p id="matchnumber"></p>
        <br>
        <br>
        <label> Match </label>
        <p id="match"></p>
        <br>
        <br>
        <label> Stadium </label>
        <p id="stadium"></p>
        <br>
        <br>
        <label> Date </label>
        <p id="date"></p>
        <br>
        <br>
        <label id=> Time </label>
        <p id="time"></p>
        <br>
        <br>
        <input type="submit" value="Submit">
-->