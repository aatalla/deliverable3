<!-- 

    Copy & Paste HW1

    Add ticket & purchase data to a new database table called PURCHASES

-->
<!DOCTYPE html> 
<html> 
<head> 
<title></title> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
</head> 
<body>

<?php echo "<form method='POST' action='response.php?matchnum=" . $_GET['matchnum'] . "'>" ?>

<h2>Please input your first name:</h2> 
<input type="text" name="fname" required> 

<h2>Please input your last name:</h2> 
<input type="text" name="lname" required>

<h2>Please input your credit card type:</h2>

<input type="radio" name="creditcardtype" id="visa" required>
<label for="visa">Visa</label>
<input type="radio" name="creditcardtype" id="master" required>
<label for="master">Master</label>
<input type="radio" name="creditcardtype" id="americanexpress" required>
<label for="americanexpress">American Express</label>

<h2>Please input your credit card number:</h2> 
<input type="tel" name="creditcardnumber" maxlength="16" pattern="[0-9]{16}" required>

<h2>Please input your CVV:</h2>
<input type="tel" name="CVV" maxlength="3" pattern="[0-9]{3}" required>

<h2>Please input Expiry date of Credit Card:</h2>
<input type="month" name="expiry" min="2020-09" required>

<h2>Please input your email address:</h2>
<input type="email" name="email" required>

<br/>
<br/>
<br/>
<br/> 
<input type="submit" value="Pay Now"> 
</form> 
</body> 
</html>