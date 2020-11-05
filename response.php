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
$email = $_POST['email'];

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
        if ($_SESSION["Guest_Ticket" . $count] == 'No')
        {
            // Add CUSTOMER
            // $CustDOB = $_SESSION["CustDOB_Ticket" . $count];
            // $CustTelNum = $_SESSION["CustTel_Ticket" . $count];
            // $CustFanID = $_SESSION['CustFanID_Ticket' . $count];
            // $CustEmail = $_SESSION["CustEmail_Ticket" . $count];
            // $CustNationality = $_SESSION["CustNationality_Ticket" . $count];
            // $CustFName = $_SESSION['CustFName_Ticket' . $count];
            // $CustLName = $_SESSION['CustLName_Ticket' . $count];
            // $CustAddress = $_SESSION["CustAddress_Ticket" . $count];
            
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

    // $count = 1;
    // while ($count < $_SESSION["numberOfTickets"] + 1)
    // {
    //     // Add TICKET
    // }
    
    $letter = chr(rand(65,90)); // Random letter from A - Z
    $ticketNumber = rand(100000, 999999);

    $ticketID = $letter . $ticketNumber;
    $MatchNumber = $_GET['matchnum'];
    $SeatCategory;
    $TicketType = 'individual';
    $Price = $amount;
    $FanID;
    $TeamName = NULL;
    $SpecificStadiumName = NULL;
    $SeatPavillion;
    $SeatLevel;
    $SeatBlock;
    $SeatRow;
    $SeatNumber;
    $SeatStadium;
    $CCNumber = $creditcardnumber;

    // Subtract tickets from capacity
    //



    // Ticket: TicketID, MatchNumber, SeatCategory, TicketType, Price, FanID, TeamName, SpecificStadiumName, SeatPavillion, SeatLevel, SeatBlock, SeatRow, SeatNumber, SeatStadium, CCNumber

    echo "Ticket ID: " . $ticketID . "<br>";

    echo "First Name: " . $firstname . "<br>" . "Last Name: " . $lastname . "<br>";

    $creditcardnumber = $_POST['creditcardnumber'];
    $lastfour = substr($creditcardnumber, 12);
    echo "Last four digits of credit card: " . $lastfour . "<br>";

    date_default_timezone_set("Asia/Qatar");

    $date = date("d-m-Y");
    $time = date("h:i A");

    echo "Date & Time of payment: " . $date . " // " . $time;

    // PURCHASES table columns: TicketNumber, TicketCategory, TicketPrice, Team1, Team2, MatchTime, MatchDate, Stadium, StadiumAddress, SeatDetails
    $sql = "INSERT INTO PURCHASES VALUES ()";
    $result = $conn->query($sql);

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