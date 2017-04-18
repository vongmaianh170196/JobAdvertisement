<?php

while($row = mysqli_fetch_array($result))
{
    $value = $row['TITLE'];
    echo '<div class=\"jobad\">';
    echo    '<a href="singleAd.php?expand='.$row['ID_ADV'].'">'.'<h2>'.$value.'</h2></a>';

    echo '<p>Location: '.$row['LOCATION'].' </p>';
    echo   "<p>Application deadline: ". finnish_dateformat($row['DEADLINE'])."</p>
              <p>Requirement: ".substr($row['REQUIREMENT'],0,100)."</p>
              <p>Futher Info : ".substr($row['FURTHER_INFO'], 0, 100)."</p>";
    echo    '<a href="singleAd.php?expand='.$row['ID_ADV'].'">';
    echo     '<button class="linkbutton"> See More</button>';
    echo    '</a>';
    echo   "</div>
          </div>";
}

?>