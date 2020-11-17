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
<title> Worldcup 2022 - Confirmation </title>
</head>

<body>

<p style="text-align: center; font-size: 36px;"> <b>World Cup 2022 Confirm Purchase</b> </p>

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

$_SESSION["Customer"] = $_POST;
$count = 1;

echo 
"<table width=75% border='1'>
    <tr>
        <td>Category</td>
        <td>Guest</td>
        <td>Customer Fan ID if Guest</td>
        <td>Fan ID</td>
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
    
    echo "<td>" . $value . "</td>";

    if(substr($key, 0, 10)== "CustEmail"){
        echo "</tr>";
    }
}

echo "</table>";
echo "<br>";
echo "<br>";
echo "Total Price: QAR " . $_SESSION["total_price"];

echo "<br>
      <br>
      <button> <a href='creditcard_validation.php?matchnum=" . $_GET['matchnum'] . "'> Proceed to Payment </a></button>";

?>

<!-- Copyright section -->
<footer class="footer">
    <hr>
    <p>Copyright Team 2X</p>
</footer>

</html>