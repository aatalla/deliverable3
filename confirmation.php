<?php
session_start();
echo 
"<table width=75% border='1'>
    <tr>
        <td>Fan ID</td>
        <td>First Name</td>
        <td>Last Name</td>
        <td>DOB</td>
        <td>Nationality</td>
        <td>Address</td>
        <td>Telephone Number</td>
        <td>Email</td>
    </tr>";
$_SESSION["everything"] = array();
foreach($_POST as $key => $value) {
    if (substr($key, 0, 10) == "CustFanID"){
        echo "<tr>";
        $x = array();
    }
    echo "<td>" . $value . "</td>";
    array_push($x, $value);
    if($key == "CustEmail_Ticket1"){
        echo "</tr>";
        array_push($_SESSION["everything"], $x);
    }
    else if (substr($key, 0, 18) == "CustAddress_Ticket" and $key != "CustAddress_Ticket1"){
        echo "</tr>";
        array_push($_SESSION["everything"], $x);
    }
}
echo "</table>";
print_r($_SESSION["everything"]);

?>
<br>
<br>
<button> <a href="creditcard_validation.php"> Proceed to Payment </a></button>