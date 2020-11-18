<!DOCTYPE html>

<html>

<style>

    /* footer (copyright) style */
    .footer {
        position:fixed;
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
<title> Worldcup 2022 - Credit Card Information </title>
</head>

<body>

<?php 
    session_start();

    if(!isset($_SESSION["login_status"]) || $_SESSION["login_status"] <> 1){
        header("location: home.html");
        return;
    }
?>

<p style="text-align: center; font-size: 36px;"> <b>World Cup 2022 Credit Card Information</b> </p>

<hr>

<!-- Aligning the buttons, and making them clickable -->
<div class="center">
    <button class="buttons"><a href="home.html">Home</a></button>
    <br>
    <br>
    <br>
</div>

<?php echo "<form method='POST' action='response.php?matchnum=" . $_GET['matchnum'] . "'>" ?>

<h2>Please input your first name:</h2> 
<input type="text" name="fname" required> 

<h2>Please input your last name:</h2> 
<input type="text" name="lname" required>

<h2>Please input your credit card type:</h2>
<select name="creditcardtype" required>
    <option>
        Visa
    </option>
    <option>
        Master
    </option>
    <option>
        American
    </option>
</select>

<h2>Please input your credit card number:</h2> 
<input type="tel" name="creditcardnumber" maxlength="16" pattern="[0-9]{16}" required>

<h2>Please input your CVV:</h2>
<input type="tel" name="CVV" maxlength="3" pattern="[0-9]{3}" required>

<h2>Please input Expiry date of Credit Card:</h2>
<input type="month" name="expiry" min="2020-11" required>

<h2>Please input FanID</h2>
<input type="number" name="fanID" required>

<br/>
<br/>
<br/>
<br/> 
<input type="submit" value="Pay Now"> 
</form> 
</body>

<!-- Copyright section -->
<footer class="footer">
    <hr>
    <p>Copyright Team 2X</p>
</footer>

</html>