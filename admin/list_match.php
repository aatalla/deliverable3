<html>
    <?php include('hw3.php'); ?>
    <style>
    table,td,th{
        text-align:center; 
        border: 1px black solid;
        border-collapse: collapse;
        padding: 5px;
    }
    </style>
    <body>
            <?php
                $servername = "dbproject5.org";
                $username = "Team2X_admin";
                $password = "Team2X_admin";
                $dbname = "Team2X_Project";
                $conn = new mysqli($servername, $username, $password, $dbname);
                $get_matches_sql = "select * from FOOTBALL_MATCH";
                $get_matches = $conn->query($get_matches_sql);
                if($get_matches->num_rows == 0)
                {
                    echo "There are no matches to display.";
                }
                
                else{
                    echo "<table>";
                    echo "<tr>";
                    echo "<th>Match Number</th>";
                    echo "<th>Match Date</th>";
                    echo "<th>Match Time</th>";
                    echo "<th>Team 1</th>";
                    echo "<th>Team 2</th>";
                    echo "<th>Stadium</th>";
                    echo "<th>Capacity</th>";
                    echo "<th>City</th>";
                    echo "<th>Functions</th>";
                    echo "</tr>";

                    while($get_matches_row = $get_matches->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>" . $get_matches_row["matchnumber"] . "</td>";
                        echo "<td>" . $get_matches_row["matchdate"] . "</td>";
                        echo "<td>" . $get_matches_row["matchtime"] . "</td>";
                        echo "<td>" . $get_matches_row["team1"] . "</td>";
                        echo "<td>" . $get_matches_row["team2"] . "</td>";
                        echo "<td>" . $get_matches_row["stadiumname"] . "</td>";
                        
                        $get_seats_sql = "select numofseats from stadium where stadiumname=" . "'" . $get_matches_row["stadiumname"] . "'";
                        $get_seats = $conn->query($get_seats_sql)->fetch_assoc()["numofseats"];
                        echo "<td>" . $get_seats . "</td>";
                        
                        $get_city_sql = "select city from stadium where stadiumname=" . "'" . $get_matches_row["stadiumname"] . "'";
                        $get_city = $conn->query($get_city_sql)->fetch_assoc()["city"];
                        echo "<td>" . $get_city . "</td>";
    
                        echo "<td>" . "<button><a href='update_match.php?id=" . $get_matches_row["matchnumber"] . "'> Update </a></button>" . 
                            "<button><a href='delete_match.php?id=" . $get_matches_row["matchnumber"] . "'> Delete </a></button>" . "
                            </td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            ?>
        
    </body>
</html>
