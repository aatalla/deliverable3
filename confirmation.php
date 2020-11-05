<?php
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

foreach($_POST as $key => $value) {
    if (substr($key, 0, 10) == "CustFanID"){
        $new = True;
        echo "<tr>";
    }
    echo
        "<td>" . $value . "</td>" .
        "<td>" . $value . "</td>" .
        "<td>" . $value . "</td>" ;
        // <td>DOB</td>
        // <td>Nationality</td>
        // <td>Address</td>
        // <td>Telephone Number</td>
        // <td>Email</td>";
    if ($new){
        echo "</tr>";
        $new = False;
    }
}
echo "</table>";?>