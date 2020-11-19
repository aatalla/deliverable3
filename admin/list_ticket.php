<html>
    <?php include('admin_home.php');
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION["admin_login_status"]) || $_SESSION["admin_login_status"] <> 1){
    header("location: login_page.html");
    return;
}
    ?>
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
                $get_tickets_sql = "select * from TICKET;";
                $get_tickets = $conn->query($get_tickets_sql);
                if($get_tickets->num_rows == 0)
                {
                    echo "There are no matches to display.";
                }
                
                else{
                    echo "<input type='text' id='myInput' onkeyup='myFunction()' placeholder='Search for Customers..' title='Type in a FanID'>";
                    echo "<table>";
                    echo "<tr>";
                    echo "<th>Ticket ID</th>";
                    echo "<th>MatchNumber</th>";
                    echo "<th>SeatCategory</th>";
                    echo "<th>Ticket Type</th>";
                    echo "<th>Price</th>";
                    echo "<th>Fan ID</th>";
                    echo "<th>Seat Pavillion</th>";
                    echo "<th>Seat Level</th>";
                    echo "<th>Seat Block</th>";
                    echo "<th>Seat Row</th>";
                    echo "<th>Seat Number</th>";
                    echo "<th>Stadium Name</th>";
                    echo "<th>CC Number</th>";
                    echo "</tr>";

                    while($get_tickets_row = $get_tickets->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>" . $get_tickets_row["TicketID"] . "</td>";
                        echo "<td>" . $get_tickets_row["MatchNumber"] . "</td>";
                        echo "<td>" . $get_tickets_row["SeatCategory"] . "</td>";
                        echo "<td>" . $get_tickets_row["TicketType"] . "</td>";
                        echo "<td>" . $get_tickets_row["Price"] . "</td>";
                        echo "<td>" . $get_tickets_row["FanID"] . "</td>";
                        echo "<td>" . $get_tickets_row["SeatPavillion"] . "</td>";
                        echo "<td>" . $get_tickets_row["SeatLevel"] . "</td>";
                        echo "<td>" . $get_tickets_row["SeatBlock"] . "</td>";
                        echo "<td>" . $get_tickets_row["StadiumName"] . "</td>";
                        echo "<td>" . $get_tickets_row["CCNumber"] . "</td>";
                        echo "<td>" . $get_tickets_row["Team1"] . "</td>";
                        echo "<td>" . $get_tickets_row["Team2"] . "</td>";
                        echo "<td>" . $get_tickets_row["StadiumName"] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            ?>
    <script>
        function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[5];
            if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
            }       
        }
        }
    </script>
    </body>
</html>
