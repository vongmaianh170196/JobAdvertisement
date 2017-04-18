
<?php
/**
 * Created by PhpStorm.
 * User: nguyenlinh
 * Date: 04/03/2017
 * Time: 16.29
 */
include ('includes/config.php');
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
$query= "SELECT * FROM `ADVERTISEMENT` WHERE DEADLINE >= NOW()";

$result = mysqli_query($conn,$query);

include_once ('includes/adloop.php');
?>

