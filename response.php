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
    <br>
    <br>
    <br>
</div>

</body>

<?php 

session_start();

if(isset($_SESSION["login_status"]) && $_SESSION["login_status"] === 1){
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
    $creditcardnumber = intval($_POST['creditcardnumber']);
    $cvv = intval($_POST['CVV']);
    $firstname = $_POST['fname']; 
    $lastname = $_POST['lname']; 
    $edate = $_POST['expiry'];
    $year = intval(str_split($edate, "4")[0]);
    $month = intval(str_split($edate, "4")[1]);
    $fanid = $_POST['fanID'];
    $sql = "INSERT INTO CCDetails VALUES ('" . $creditcardtype . "', " . $creditcardnumber . ", " . $cvv . ", '" . $firstname. "', '" . $lastname . ", " . $month . ", " . $year  . ", '". $fanid ."')";
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
        if ($result_stadiumname->num_rows > 0)
        {
            while($row = $result_stadiumname->fetch_assoc()) 
            {
                $SeatStadium = $row['StadiumName'];
                $team1 = $row['Team1'];
                $team2 = $row['Team2'];
                $matchtime = $row['KickOffTime'];
                $matchdate = $row['KickOffDate'];
            }
        }
        $CCNumber = $_POST['creditcardnumber'];

        $sql = "INSERT INTO TICKET VALUES ('" . $TicketID . "', " . $MatchNumber . ", " . $SeatCategory . ", '" . $TicketType. "', " . $Price . ", " . $FanID . ", " . $TeamName . ", " . $SpecificStadiumName . ", " . $SeatPavillion  . ", ". $SeatLevel . ", '" . $SeatBlock . "', ". $SeatRow . ", " . $SeatNumber . ", '". $SeatStadium . "', '". $CCNumber ."')";
        $conn->query($sql);

        echo "<hr>";
        echo "TicketID:" . $TicketID;
        echo "<br>";
        echo "Category" . $SeatCategory . "    " . "QAR" . $Price;
        echo "<br>";
        echo $team1 . " VS. " . $team2;
        echo "<br>";
        echo $matchtime . "    " . $matchdate;
        echo "<br>";
        echo "Stadium: " . $SeatStadium;
        echo "<br>";
        $sql_stadiumaddress = "SELECT StadiumAddress FROM STADIUM WHERE StadiumName = '" . $SeatStadium . "'"; 
        $result_stadiumaddress = $conn->query($sql_stadiumaddress);
        if ($result_stadiumaddress->num_rows > 0)
        {
            while($row = $result_stadiumaddress->fetch_assoc()) 
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

        $count = $count + 1;
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

<!-- Copyright section -->
<footer class="footer">
    <hr>
    <p>Copyright Team 2X</p>
</footer>

</html>