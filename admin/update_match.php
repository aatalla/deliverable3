<?php
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION["admin_login_status"]) || $_SESSION["admin_login_status"] <> 1){
    header("location: login_page.html");
    return;
}   
    include('admin_home.php');
    $servername = "dbproject5.org";
    $username = "Team2X_admin";
    $password = "Team2X_admin";
    $dbname = "Team2X_Project";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "select * from Mat where matchnumber = " . $_GET["id"];
    $things = $conn->query($sql)->fetch_assoc();
    $_SESSION["id"] = $things['matchnumber'];
?>
<html>
    <form action="confirm_update.php" method="post">
        <label> Match Number </label>
        <input type="number" name="matchnumber" value="<?php echo $things['matchnumber']; ?>" readonly>
        <br/>
        <label> Match Date </label>
        <input type="date" name="matchdate" value="<?php echo $things['matchdate']; ?>" required>
        <br/>
        <label> Match Time</label>
        <input type="time" name="matchtime" value="<?php echo $things['matchtime']; ?>" required>
        <br/>
        <label> Team 1 </label>
        <select name="team1" required>
            <option selected><?php echo $things['team1']; ?></option>
            <?php
            $team1_sql = "select * from team";
            $team1_options = $conn->query($team1_sql);
            while($team1_row = $team1_options->fetch_assoc()){
                if($things['team1'] != $team1_row["teamcountry"]){
                    echo "<option>". $team1_row["teamcountry"] ."</option>";
                }
            }
            ?>
        </select>
        <br/>
        <label> Team 2 </label>
        <select name="team2" required>
            <option selected><?php echo $things['team2']; ?></option>
            <?php
            $team2_sql = "select * from team";
            $team2_options = $conn->query($team2_sql);
            while($team2_row = $team2_options->fetch_assoc()){
                if($things['team2'] != $team2_row["teamcountry"]){
                    echo "<option>". $team2_row["teamcountry"] ."</option>";
                }
            }
            ?>
        </select>
        <br/>
        <label> Stadium </label>
        <select id="stadium_selection" name="stadium_selection" required>
        <option selected> <?php echo $things['stadiumname']; ?> </option>
        <?php
        $stadium_sql = "select * from stadium";
        $stadium_options = $conn->query($stadium_sql);
        while($stadium_row = $stadium_options->fetch_assoc()){
            if($things['stadiumname'] != $stadium_row["stadiumname"]){
                echo "<option>" ;
                echo $stadium_row["stadiumname"];
                echo "</option>";
            }
        }
        ?>
        </select>
        <br/>
        <input type="submit" value="Update">
    </form>
</html>    