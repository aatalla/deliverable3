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
<title> Worldcup 2022 - Purchases </title>
</head>

<body>

<p style="text-align: center; font-size: 36px;"> <b>World Cup 2022 Purchases</b> </p>

<hr>

<!-- Aligning the buttons, and making them clickable -->
<div class="center">
    <button class="buttons"><a href="customer_home.php">Home</a></button>
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

$sql = "SELECT t.TicketID, t.SeatCategory, t.Price, m.Team1, m.Team2, m.KickOffTime, m.KickOffDate, t.StadiumName, t.SeatPavillion, t.SeatLevel, t.SeatBlock, t.SeatRow, t.SeatNumber 
        FROM TICKET t, FOOTBALL_MATCH m, CUSTOMER c
        WHERE t.MatchNumber = m.MatchNumber AND t.FanID = c.CustFanID  AND c.CustEmail = '" . $_SESSION['email'] . "';";
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
     echo "<tr><td>" . $row["TicketID"] . "</td>" .
          "<td>".$row["SeatCategory"] . "</td>" .
          "<td>".$row["Price"] . "</td>" .
          "<td>".$row["Team1"] . "</td>" .
          "<td>".$row["Team2"] . "</td>" .
          "<td>".$row["KickOffTime"] . "</td>" . 
          "<td>".$row["KickOffDate"] . "</td>" .
          "<td>".$row["StadiumName"] . "</td>" .
          "<td>".$row["SeatPavillion"] . "</td>" .
          "<td>".$row["SeatLevel"] . "</td>" .
          "<td>".$row["SeatBlock"] . "</td>" .
          "<td>".$row["SeatRow"] . "</td>" .
          "<td>".$row["SeatNumber"] . "</td>" ."</tr>";
   }
   echo "</table>";
} else {
   echo "You have not purchased any tickets yet.";
}

 $conn->close();
 
 ?>

<!-- Copyright section -->
<footer class="footer">
    <hr>
    <p>Copyright Team 2X</p>
</footer>

</html>