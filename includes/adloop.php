<?php

while($row = mysqli_fetch_array($result))
{
    $value = $row['TITLE'];
    echo '<div class=\"jobad\">';
    echo    '<a href="singleAd.php?expand='.$row['ID_ADV'].'">'.'<h2>'.$value.'</h2></a>';

    echo '<p><b>Location:</b> '.$row['LOCATION'].' </p>';
    echo   "<p><b>Application deadline:</b> ". finnish_dateformat($row['DEADLINE'])."</p>
              <p><b>Requirement:</b> ".substr($row['REQUIREMENT'],0,100)."</p>
              <p><b>Futher Info:</b> ".substr($row['FURTHER_INFO'], 0, 100)."</p>
              <p><b>Job type:</b> ".$row['JOB_TYPE']."</p>";
    echo    '<a href="singleAd.php?expand='.$row['ID_ADV'].'">';
    echo     '<button class="linkbutton"> See More</button>';
    echo    '</a>';
    echo   "</div>
          </div>";
}

?>