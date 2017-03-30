<?php
	while($row = mysqli_fetch_array($result))
		{
			// Calculates the years and months from the database's work experience column (which is just total months)
			$months = $row['WORK_EXPERIENCE'] % 12; // modulo
			$years = $row['WORK_EXPERIENCE'] - $months;
			$years = $years / 12; // division
			$profiletext = $row['PROFILE_TEXT'];
			
			echo "<p>";
			echo "<b>Name:</b> ".$row['FIRSTNAME']." ";
			echo $row['LASTNAME']."<br />";
			echo "<b>Degree:</b> ".$row['DEGREE']."<br />";
			echo "<b>Faculty:</b> ".$row['FACULTY']."<br />";
			echo "<b>Work experience:</b> ".$years." years, ".$months." months <br />";
			echo "<b>Other info:</b> <br />";
			echo $profiletext."<br />";
			echo "</p>";
		}
?>
