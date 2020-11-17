<style>
    .center {
        text-align: center;
    }
</style>
<?php

session_start();
$_SESSION["login_status"] = 0;

?>
<div class="center">
<form>
    <label>Email: </label>
    <input type="email">
    <br>
    <br>
    <label>Password: </label>
    <input type="text">
</form>
</div>