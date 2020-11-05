<?php
    // while($count < $sumOfTickets){
    //     echo "<form action = 'creditcard_validation.php' method='post'>
    //         <label> Enter First Name </label>
    //         <input type='text' name='Fname' required>
    //         <label> Enter Last Name </label>
    //         <input type='text' name='Fname' required>
    //         <label> Enter Fan ID </label>
    //         <input type='number' name='FanID' required>
    //         <label> Enter Email </label>
    //         <input type='text' name='Fname' required>
    //         <label> Enter Nationality </label>
    //         </form>";
    // };

    $count = 1;
    $sumOfTickets = $_POST['cat1amount'] + $_POST['cat2amount'] + $_POST['cat3amount'] + $_POST['cat4amount'];

    echo "<form action='confirmation.php' method='post'>";

    while ($count < $sumOfTickets + 1)
    {

        echo "<h1>" . "Ticket " . $count . " Details</h1>";

        echo "<label>FanID:</label><br>
              <input type='number' name='CustFanID_Ticket" . $count . "' required><br>";

        echo "<label>First name:</label><br>
              <input type='text' name='CustFName_Ticket" . $count . "' required><br>";

        echo "<label>Last name:</label><br>
              <input type='text' name='CustLName_Ticket" . $count . "' required><br>";

        echo "<label>Date of Birth:</label><br>
              <input type='date' name='CustDOB_Ticket" . $count . "' required><br>";

        echo "<label>Nationality:</label><br>
              <input type='text' name='CustNationality_Ticket" . $count . "' required><br>";
        
        echo "<label>Address:</label><br>
              <input type='text' name='CustAddress_Ticket" . $count . "' required><br>";
        
        if ($count == 1)
        {

            echo "<label>Telephone Number:</label><br>
                  <input type='number' name='CustTel_Ticket" . $count . "' required><br>";
      
            echo "<label>Email:</label><br>
                  <input type='text' name='CustEmail_Ticket" . $count . "' required><br>";

        }

        echo "<br>";

        $count = $count + 1;

    }

    echo "<input type='submit' value='Pay Now'></form>";
?>