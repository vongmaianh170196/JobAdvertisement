<?php
/**
 * Created by PhpStorm.
 * User: nguyenlinh
 * Date: 28/03/2017
 * Time: 23.44
 */
include 'includes/config.php';
session_start();
if(isset($_GET['expand'])){

    $query= "SELECT * FROM `ADVERTISEMENT` WHERE ID_ADV ='".$_GET['expand']."'";

    $result = mysqli_query($conn,$query);


    while($row = mysqli_fetch_array($result))
    {
        $value = $row['TITLE'];

        echo '<div class=\"advertisement\">';

        echo    '<a href="singleAd.php?expand='.$row['ID_ADV'].'">';
        echo    '<h1>'.$value.'</h1>';
        echo    '</a>';
        echo '<p>Location: Across all offices </p>';
        echo   "<p>Application deadline: ". finnish_dateformat($row['DEADLINE'])."</p>
          <p>Requirement: ".$row['REQUIREMENT']."</p>
          <p>Futher Info : ".$row['FURTHER_INFO']."</p>


        </div>
      </div>";
    }

}