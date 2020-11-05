<?php
    $count = 0;
    $sumOfTickets = $_POST['cat1amount'] + $_POST['cat2amount'] + $_POST['cat3amount'] + $_POST['cat4amount'];
    while($count < $sumOfTickets){
        echo "<form action = 'creditcard_validation.php' method='post'>
            <label> Enter First Name </label>
            <input type='text' name='Fname' required>
            <label> Enter Last Name </label>
            <input type='text' name='Fname' required>
            <label> Enter Fan ID </label>
            <input type='number' name='FanID' required>
            <label> Enter Email </label>
            <input type='text' name='Fname' required>
            <label> Enter Nationality </label>
            </form>";
    };
?>