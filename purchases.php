<!-- 

    List all purchases (HW2 & HW3)

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
 
$sql = "SELECT * FROM PURCHASES";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   echo "<table width=75% border='1'><tr>
                    <td>TicketNumber</td>
                    <td>TicketCategory</td>
                    <td>TicketPrice</td>
                    <td>Team1</td>
                    <td>Team2</td>
                    <td>MatchTime</td>
                    <td>MatchDate</td>
                    <td>StadiumName</td>
                    <td>SeatPavillion</td>
                    <td>SeatLevel</td>
                    <td>SeatBlock</td>
                    <td>SeatRow</td>
                    <td>SeatNumber</td></tr>";
   // output data of each row
   while($row = $result->fetch_assoc()) {
     echo "<tr><td>" . $row["TicketNumber"] . "</td>" .
          "<td>".$row["TicketCategory"] . "</td>" .
          "<td>".$row["TicketPrice"] . "</td>" .
          "<td>".$row["Team1"] . "</td>" .
          "<td>".$row["Team2"] . "</td>" . 
          "<td>".$row["MatchTime"] . "</td>" . 
          "<td>".$row["MatchDate"] . "</td>" .
          "<td>".$row["StadiumName"] . "</td>" .
          "<td>".$row["SeatPavillion"] . "</td>" .
          "<td>".$row["SeatLevel"] . "</td>" .
          "<td>".$row["SeatBlock"] . "</td>" .
          "<td>".$row["SeatRow"] . "</td>" .
          "<td>".$row["SeatNumber"] . "</td>" ."</tr>";
   }
   echo "</table>";
} else {
   echo "No data in table.";
}

 $conn->close();
 
 ?>
 
<!-- Copyright section -->
<footer class="footer">
    <hr>
    <p>Copyright Team 2X</p>
</footer>

</html>