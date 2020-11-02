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

$sql = "SELECT * FROM Match_oalqarah";
$result = $conn->query($sql);

$count = 0;

if ($result->num_rows > 0) {
  echo "<table width=75%><tr><td>MatchNumber</td>
                   <td>MatchDate</td>
                   <td>MatchTime</td>
                   <td>Team1</td>
                   <td>Team2</td>
                   <td>Stadium</td></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["matchnumber"] . "</td>" .
         "<td>".$row["team1"] . "</td>" .
         "<td>".$row["team2"] . "</td>" . 
         "<td>".$row["stadiumname"] . "</td>" .
         "<td>".$row["matchdate"] . "</td>" .
         "<td>".$row["matchtime"] . "</td>" .
         '<td><a href="match_update.php?id=' . $row["matchnumber"] . '"style="display:block;">Book</a></td>' . "</td></tr>";
  }
  echo "</table>";
} else {
  echo "No data in table.";
}
$conn->close();
?>

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