<html>
<?php include('admin_home.php');
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION["admin_login_status"]) || $_SESSION["admin_login_status"] <> 1){
    header("location: ../login_page.html");
    return;

}
    ?>
    <body>
            <?php
                $servername = "dbproject5.org";
                $username = "Team2X_admin";
                $password = "Team2X_admin";
                $dbname = "Team2X_Project";
                $conn = new mysqli($servername, $username, $password, $dbname);
                $get_guest_sql = "select * from GUEST";
                $get_guest = $conn->query($get_guest_sql);
                if($get_guest->num_rows == 0)
                {
                    echo "There are no guest to display.";
                }
                
                else{
                    echo "<table>";
                    echo "<tr>";
                    echo "<th>Guest Fan ID</th>";
                    echo "<th>Customer Fan ID</th>";
                    echo "<th>Guest First Name</th>";
                    echo "<th>Guest Last Name</th>";
                    echo "<th>Guest DOB</th>";
                    echo "<th>Guest Email</th>";
                    echo "<th>Guest Nationality</th>";
                    echo "<th>Guest Telephone Number</th>";
                    echo "<th>Guest Address</th>";
                    echo "</tr>";

                    while($get_guest_row = $get_guest->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>" . $get_guest_row["GuestFanID"] . "</td>";
                        echo "<td>" . $get_guest_row["CustFanID"] . "</td>";
                        echo "<td>" . $get_guest_row["GuestFname"] . "</td>";
                        echo "<td>" . $get_guest_row["GuestLName"] . "</td>";
                        echo "<td>" . $get_guest_row["GuestDOB"] . "</td>";
                        echo "<td>" . $get_guest_row["GuestEmail"] . "</td>";
                        echo "<td>" . $get_guest_row["GuestNationality"] . "</td>";
                        echo "<td>" . $get_guest_row["GuestTelNumber"] . "</td>";
                        echo "<td>" . $get_guest_row["GuestAddress"] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            ?>

    </body>
</html>