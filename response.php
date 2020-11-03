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

$firstname = $_POST['fname']; 
$lastname = $_POST['lname']; 
$creditcardnumber = $_POST['creditcardnumber'];
$cvv = $_POST['CVV'];
$expiry = $_POST['expiry'];
$amount = $_POST['amount'];
$email = $_POST['email'];

$sum = 0;
for ($i = 15; $i >= 0; $i--)
{
    $x = (int) substr($creditcardnumber, $i);
    $sum += $x;
    $creditcardnumber = substr($creditcardnumber, 0, $i);
}

$success;

if ($sum % 2 == 0) 
{
    $success = "Successful";
    
    // PURCHASES table columns: TicketNumber, TicketCategory, TicketPrice, Team1, Team2, MatchTime, MatchDate, Stadium, StadiumAddress, SeatDetails
    $sql = "INSERT INTO PURCHASES VALUES ()";
    $result = $conn->query($sql);

} else {
    $success = "Failed";
}

echo "Payment Status: " . $success . "<br>";

$transactionid = rand(1000000000, 9999999999);
echo "Transaction ID: " . $transactionid . "<br>";

echo "First Name: " . $firstname . "<br>" . "Last Name: " . $lastname . "<br>";

$creditcardnumber = $_POST['creditcardnumber'];
$lastfour = substr($creditcardnumber, 12);
echo "Last four digits of credit card: " . $lastfour . "<br>";

echo "Amount Paid: $" . $amount . "<br>";

date_default_timezone_set("Asia/Qatar");

$date = date("d-m-Y");
$time = date("h:i A");

echo "Date & Time of payment: " . $date . " // " . $time;
/*
// Send email
$msg = "Transaction ID: " . $transactionid . "\n" 
        . "Full Name: " . $firstname . " " . $lastname . "\n" 
        . "Date & Time of payment: " . $date . " // " . $time . "\n"
        . "Amount Paid: $" . $amount; 
        
mail($email, "Transaction Information", $msg);
*/
?>