<!DOCTYPE HTML>
<html>
<?php

include 'includes/config.php';

$conn = mysqli_connect($servername, $username, $password, $db);
if(!$conn) {
	die("Connection error: " .mysqli_connect_error());
}

//query
$id = $_GET['id'];


$sql = "DELETE FROM ADVERTISEMENT WHERE ID_ADV =" . $id;
$response = mysqli_query($conn, $sql);


if(mysqli_affected_rows($conn) > 0) {
	echo "Successfully deleted.";
	
	
}else {
	echo "The advertisement was not found."; 
}

?>


<?php
//close
mysqli_close($conn);
?>


<head>
<meta charset="UTF-8" content="text/html">

</head>
<body>
	<br />
	<p><a href="index.php">To homepage</a></p>
</body>
</html>

