<?php
session_start();
echo 
"<table width=75% border='1'>
    <tr>
        <td>Category</td>
        <td>Guest</td>
        <td>Fan ID</t§d>
        <td>First Name</td>
        <td>Last Name</td>
        <td>DOB</td>
        <td>Nationality</td>
        <td>Address</td>
        <td>Telephone Number</td>
        <td>Email</td>
    </tr>";
foreach($_POST as $key => $value) {
    if (substr($key, 0, 8) == "Category"){
        echo "<tr>";
    }
    if(substr($key, 0, 5) == "Guest"){
        if($value == "on"){
            echo "<td> Yes </td>";
        }
        else{
            echo "<td> No </td>";
        }
    }
    else{
        echo "<td>" . $value . "</td>";
    }

    if(substr($key, 0, 10)== "CustEmail"){
        echo "</tr>";
    }
}
echo "</table>";
echo "<br>";
echo "<br>";
echo "Total Price: QAR " . $_SESSION["total_price"];

// $_SESSION["everything"] = array();
// foreach($_POST as $key => $value) {
//     array_push($_SESSION["everything"], $value);
//}

echo "<br>
      <br>
      <button> <a href='creditcard_validation.php?matchnum=" . $_GET['matchnum'] . "'> Proceed to Payment </a></button>";

?>