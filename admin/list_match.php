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
                    echo "<th>Category 1 Capacity</th>";
                    echo "<th>Category 2 Capacity</th>";
                    echo "<th>Category 3 Capacity</th>";
                    echo "<th>Category 4 Capacity</th>";
                    echo "<th>City</th>";
                    echo "<th>Functions</th>";
                    echo "</tr>";

                    while($get_matches_row = $get_matches->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>" . $get_matches_row["MatchNumber"] . "</td>";
                        echo "<td>" . $get_matches_row["KickOffDate"] . "</td>";
                        echo "<td>" . $get_matches_row["KickOffTime"] . "</td>";
                        echo "<td>" . $get_matches_row["Team1"] . "</td>";
                        echo "<td>" . $get_matches_row["Team2"] . "</td>";
                        echo "<td>" . $get_matches_row["StadiumName"] . "</td>";
                        
                        $get_seats_sql = "select Category1Capacity, Category2Capacity, Category3Capacity, Category4Capacity from STADIUM where StadiumName=" . "'" . $get_matches_row["StadiumName"] . "';";
                        $get_capacities = $conn->query($get_seats_sql);
                        while($get_capacities_row = $get_capacities->fetch_assoc()){
                            echo "<td>" . $get_capacities_row["Category1Capacity"] . "</td>";
                            echo "<td>" . $get_capacities_row["Category2Capacity"] . "</td>";
                            echo "<td>" . $get_capacities_row["Category3Capacity"] . "</td>";
                            echo "<td>" . $get_capacities_row["Category4Capacity"]. "</td>";
                        }
                        
                        $get_city_sql = "select StadiumCity from STADIUM where StadiumName=" . "'" . $get_matches_row["StadiumName"] . "'";
                        $get_city = $conn->query($get_city_sql)->fetch_assoc()["StadiumCity"];
                        echo "<td>" . $get_city . "</td>";
    
                        echo "<td>" . "<button><a href='update_match.php?id=" . $get_matches_row["MatchNumber"] . "'> Update </a></button>" . 
                            "<button><a href='delete_match.php?id=" . $get_matches_row["MatchNumber"] . "'> Delete </a></button>" . "
                            </td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            ?>
        
    </body>
</html>
