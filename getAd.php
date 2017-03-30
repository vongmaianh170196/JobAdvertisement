
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
$query= "SELECT * FROM `ADVERTISEMENT` WHERE DEADLINE > NOW()";

$result = mysqli_query($conn,$query);


while($row = mysqli_fetch_array($result))
{
    $value = $row['TITLE'];
    echo '<div class=\"advertisement\">';
    echo    '<h1>'.$value.'</h1>';

    echo '<p>Location: Across all offices </p>';
    echo   "<p>Application deadline: ". finnish_dateformat($row['DEADLINE'])."</p>
              <p>Requirement: ".substr($row['REQUIREMENT'],0,100)."</p>
              <p>Futher Info : ".substr($row['FURTHER_INFO'], 0, 100)."</p>";
    echo    '<a href="singleAd.php?expand='.$row['ID_ADV'].'">';
    echo     '<button class="linkbutton"> See More</button>';
    echo    '</a>';
    echo   "</div>
          </div>";
}

