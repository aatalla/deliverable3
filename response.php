<?php 

session_start();

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

$firstname = $_POST['fname']; 
$lastname = $_POST['lname']; 
$creditcardnumber = $_POST['creditcardnumber'];
$cvv = $_POST['CVV'];
$expiry = $_POST['expiry'];
$amount = $_SESSION['total_price'];
$numberOfTickets = $_SESSION['numberOfTickets'];

$sum = 0;

for ($i = 15; $i >= 0; $i--)
{
    $x = (int) substr($creditcardnumber, $i);
    $sum += $x;
    $creditcardnumber = substr($creditcardnumber, 0, $i);
}

if ($sum % 2 == 0) 
{
    echo "You successfully purchased " . $numberOfTickets . " ticket(s), with a total price of QAR " . $amount . "<br>";

    $count = 1;
    while ($count < $_SESSION["numberOfTickets"] + 1)
    {
        // Add CUSTOMER or Add Guest
        if ($_SESSION["Customer"]["Guest_Ticket" . $count] == 'No')
        {

            $CustDOB = $_SESSION["Customer"]["CustDOB_Ticket" . $count];
            $CustTelNum = $_SESSION["Customer"]["CustTel_Ticket" . $count];
            $CustFanID = $_SESSION["Customer"]['CustFanID_Ticket' . $count];
            $CustEmail = $_SESSION["Customer"]["CustEmail_Ticket" . $count];
            $CustNationality = $_SESSION["Customer"]["CustNationality_Ticket" . $count];
            $CustFName = $_SESSION["Customer"]['CustFName_Ticket' . $count];
            $CustLName = $_SESSION["Customer"]['CustLName_Ticket' . $count];
            $CustAddress = $_SESSION["Customer"]["CustAddress_Ticket" . $count];

            $sql = "INSERT INTO CUSTOMER VALUES ('" . $CustDOB . "', " . $CustTelNum . ", " . $CustFanID . ", '" . $CustEmail . "', '" . $CustNationality . "', '" . $CustFName . "', '" . $CustLName . "', '" . $CustAddress . "')";
            
            $conn->query($sql);
            
        } else {
            // Add GUEST
            $GuestFanID = $_SESSION["Customer"]["CustFanID_Ticket" . $count];
            $GuestNationality = $_SESSION["Customer"]["CustNationality_Ticket" . $count];
            $GuestDOB = $_SESSION["Customer"]["CustDOB_Ticket" . $count];
            $GuestFName = $_SESSION["Customer"]["CustFName_Ticket" . $count];
            $GuestLName = $_SESSION["Customer"]["CustLName_Ticket" . $count];
            $CustFanID = $_SESSION["Customer"]["GuestCustFanID_Ticket" . $count];
            $GuestTelNum = $_SESSION["Customer"]["CustTel_Ticket" . $count];
            $GuestAddress = $_SESSION["Customer"]["CustAddress_Ticket" . $count];
            $GuestEmail = $_SESSION["Customer"]["CustEmail_Ticket" . $count];

            $sql = "INSERT INTO GUEST VALUES (" . $GuestFanID . ", '" . $GuestNationality . "', '" . $GuestDOB . "', '" . $GuestFName . "', '" . $GuestLName . "', " . $CustFanID . ", " . $GuestTelNum . ", '" . $GuestAddress . "', '" . $GuestEmail . "')";
            
            $conn->query($sql);
        }

        $count = $count + 1;
    }

    // Add CCDetails
    
    $creditcardtype = $_POST['creditcardtype'];
    $creditcardnumber = int($_POST['creditcardnumber']);
    $cvv = intval($_POST['CVV']);
    $firstname = $_POST['fname']; 
    $lastname = $_POST['lname']; 
    $edate = $_POST['expiry'];
    $year = intval(str_split($edate, "-")[0]);
    $month = intval(str_split($edate, "-")[1]);
    $fanid = $_POST['fanID'];
    $sql = "INSERT INTO CCDetails VALUES ('" . $creditcardtype . "', " . $creditcardnumber . ", " . $cvv . ", '" . $firstname. "', '" . $lastname . "', '" . $edate . "', " . $GuestTelNum . ", " . $year . ", " . $month  . ", '". $fanid ."')";
    $conn->query($sql);
    

    $count = 1;
    while ($count < $_SESSION["numberOfTickets"] + 1)
    {
        
        $letter = chr(rand(65,90)); // Random letter from A - Z
        $ticketNumber = rand(100000, 999999);
        $TicketID = $letter . $ticketNumber;
        $MatchNumber = $_GET['matchnum'];
        $SeatCategory = $_SESSION["Customer"]["Category_Ticket" . $count];
        $TicketType = "individual";
        $Price = $_SESSION['cat'. $SeatCategory . 'price'];
        $FanID = $_SESSION["Customer"]["CustFanID_Ticket" . $count];
        $TeamName = NULL;
        $SpecificStadiumName = NULL;
        $SeatPavillion = rand(1, 10);
        $SeatLevel = rand(1,20);
        $SeatBlock = chr(rand(65,90)) . rand(1,150);
        $SeatRow = rand(1,20);
        $SeatNumber = rand(1,20);
        $sql_stadiumname = "SELECT * FROM FOOTBALL_MATCH WHERE MatchNumber = " . $MatchNumber; 
        $result_stadiumname = $conn->query($sql_stadiumname);
        if ($result_cat1price->num_rows > 0)
        {
            while($row = $result_cat1price->fetch_assoc()) 
            {
                $SeatStadium = $row['StadiumName'];
                $team1 = $row['team1'];
                $team2 = $row['team2'];
                $matchtime = $row['KickOffTime'];
                $matchdate = $row['KickOffDate'];
            }
        }
        $CCNumber = $_POST['creditcardnumber'];

        $sql = "INSERT INTO TICKET VALUES ('" . $TicketID . "', " . $MatchNumber . ", " . $SeatCategory . ", '" . $TicketType. "', " . $Price . ", " . $FanID . ", " . $TeamName . ", " . $SpecificStadiumName . ", " . $SeatPavillion  . ", ". $SeatLevel . ", '" . $SeatBlock . "', ". $SeatRow . ", " . $SeatNumber . ", '". $StadiumName . "', '". $CCNumber ."')";
        $conn->query($sql);

        echo "</hr>";
        echo "TicketID:" . $TicketID;
        echo "<br>";
        echo "Category" . $SeatCategory . "    " . "QAR" . $Price;
        echo "<br>";
        echo $team1 . "VS" . $team2;
        echo "<br>";
        echo $matchtime . "    " . $matchdate;
        echo "<br>";
        echo "Stadium: " . $StadiumName;
        echo "<br>";
        $sql_stadiumnaddress = "SELECT StadiumAddress FROM STADIUM WHERE MatchNumber = " . $SeatStadium; 
        $result_stadiumnaddress = $conn->query($sql_stadiumnaddress);
        if ($result_cat1price->num_rows > 0)
        {
            while($row = $result_cat1price->fetch_assoc()) 
            {
                $stadiumaddress = $row['StadiumAddress'];
            }
        }
        echo "Stadium Address: " . $stadiumaddress;
        echo "<br>";
        echo "Pavillion: " . $SeatPavillion;
        echo "<br>";
        echo "Level: " . $SeatLevel;
        echo "<br>";
        echo "Block: " . $SeatBlock;
        echo "<br>";
        echo "Seat Row: " . $SeatRow;
        echo "<br>";
        echo "Seat Number: " . $SeatNumber;
        echo "<br>";

    }    

} else {
    echo "Failed to purchase the tickets. Could not validate credit card.<br>";
}

/*
// Send email
$msg = "Transaction ID: " . $transactionid . "\n" 
        . "Full Name: " . $firstname . " " . $lastname . "\n" 
        . "Date & Time of payment: " . $date . " // " . $time . "\n"
        . "Amount Paid: $" . $amount; 
        
mail($email, "Transaction Information", $msg);
*/
?>