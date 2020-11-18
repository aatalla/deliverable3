<?php
include ('hw3.php');
$servername = "dbproject17.org";
$username = "myDBUser";
$password = "myDBUserPassword";
$dbname = "football_aatalla";
$conn = new mysqli($servername, $username, $password, $dbname);
function getstuff($inp){
    $get_capacity_sql = "select numofseats from stadium where stadiumname = " . "'" . $inp . "'";
    $get_capacity = $GLOBALS["conn"]->query($get_capacity_sql);
    while($get_capacity_row = $get_capacity->fetch_assoc()){
        echo $get_capacity_row["numofseats"];
    }  
};
?>

<?php
$x = array();
$get_everything_sql = "select stadiumname, numofseats from stadium";
$get_everything = $GLOBALS["conn"]->query($get_everything_sql);
while($get_everything_row = $get_everything->fetch_assoc()){
    $x[$get_everything_row["stadiumname"]] = $get_everything_row["numofseats"];
}
echo "<script> var s = [] </script>";
foreach($x as $key=>$value){
    echo "<script>" . "s['$key'] = $value" . "</script>";
}

$y = array();
$get_cities_sql = "select stadiumname, city from stadium";
$get_cities = $GLOBALS["conn"]->query($get_cities_sql);
while($get_cities_row = $get_cities->fetch_assoc()){
    $y[$get_cities_row["stadiumname"]] = $get_cities_row["city"];
}
echo "<script> var c = [] </script>";
foreach($y as $key=>$value){
    echo "<script>" . "c['$key'] = '$value'" . "</script>";
}
?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<html>
    <form action="add_match.php" method="post">
        <label> Match Number </label>
        <input type="number" name="matchnumber" required>
        <br/>
        <label> Match Date </label>
        <input type="date" name="matchdate" required>
        <br/>
        <label> Match Time</label>
        <input type="time" name="matchtime" required>
        <br/>
        <label> Team 1 </label>
        <select name="team1" required>
            <option disabled selected value> -- select an option -- </option>
            <?php
            $team1_sql = "select * from team";
            $team1_options = $conn->query($team1_sql);
            while($team1_row = $team1_options->fetch_assoc()){
                echo "<option>". $team1_row["teamcountry"] ."</option>";
            }
            ?>
        </select>
        <br/>
        <label> Team 2 </label>
        <select name="team2" required>
            <option disabled selected value> -- select an option -- </option>
            <?php
            $team2_sql = "select * from team";
            $team2_options = $conn->query($team2_sql);
            while($team2_row = $team2_options->fetch_assoc()){
                echo "<option>". $team2_row["teamcountry"] ."</option>";
            }
            ?>
        </select>
        <br/>
        <label> Stadium </label>
        <script>
            function printing(){
                var z =$("#stadium_selection option:selected").text();
                document.getElementById("city").value = c[z];
                document.getElementById("nofseats").value = s[z];
            }
        </script>
        <select id="stadium_selection" name="stadium_selection" onchange="printing()" required>
        <option disabled selected value> -- select an option -- </option>
        <?php
        $stadium_sql = "select * from stadium";
        $stadium_options = $conn->query($stadium_sql);
        while($stadium_row = $stadium_options->fetch_assoc()){
            echo "<option>" ;
            echo $stadium_row["stadiumname"];
            echo "</option>";
        }
        ?>
        </select>
        <br/>
        <label>City</label>
        <input id = "city" name="city" value="" readonly>
        <br/>
        <label>Number of Seats</label>
        <input id = "nofseats" name="nofseats" value="" readonly>
        <br/>
        <input type="submit" value="Submit">
    </form>
</html>