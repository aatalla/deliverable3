<?php
/*connecting to sql server*/
?>
<?php /*save all matches' info in a php associative array*/ ?>
<?php /*save all these values in a javascript array and use it to reflect the things on the webpage*/?>
<html>
    <form action="" method = "POST">
        <select onchange = "">
            <option disabled selected value> -- select an option -- </option>
            <?php /*loop through the php array and display the matches */ ?>
        </select>
        <?php /*on changing the match value, we will get the info from the php array and sace it in variable*/?>
        <!-- -->
        <br>
        <br>
        <label> Match Number </label>
        <p id="matchnumber"></p>
        <br>
        <br>
        <label> Match </label>
        <p id="match"></p>
        <br>
        <br>
        <label> Stadium </label>
        <p id="stadium"></p>
        <br>
        <br>
        <label> Date </label>
        <p id="date"></p>
        <br>
        <br>
        <label id=> Time </label>
        <p id="time"></p>
        <br>
        <br>
        <input type="submit" value="Submit">
    
</html>
