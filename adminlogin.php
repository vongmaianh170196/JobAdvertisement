
<?php
include ('includes/config.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<form  method="post" action="join.php">
    <label for="adm_usn">Username:</label>
    <input type="text" name="adm_usn">
    <br>
    </br>
    <label for="adm_pass">Password:</label>
    <input type="password" name="adm_pass">
    <br>
    <button type="submit">Log in</button>
</form>

</body>
</html>
