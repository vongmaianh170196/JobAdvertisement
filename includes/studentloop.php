<?php
	while($row = mysqli_fetch_array($result))
		{
			// Calculates the years and months from the database's work experience column (which is just total months)
			$months = $row['WORK_EXPERIENCE'] % 12; // modulo
			$years = $row['WORK_EXPERIENCE'] - $months;
			$years = $years / 12; // division

			$profiletext = $row['PROFILE_TEXT'];
			$id = $row['REF_STUDENT'];

            echo "<hr />";
			echo "<p>";
			echo "<b>Name:</b> ".$row['FIRSTNAME']." ";
			echo $row['LASTNAME']."<br />";
			echo "<b>Degree:</b> ".$row['DEGREE']."<br />";
			echo "<b>Faculty:</b> ".$row['FACULTY']."<br />";
			echo "<b>Work experience:</b> ".$years." years, ".$months." months <br />";
			echo "<b>Other info:</b> <br />";
			echo $profiletext."<br />";
			echo "<b>Skills: </b>";
			echo "</p>";
			echo "<ul>";
            $queryskill = "SELECT SKILL FROM STUDENT_SKILL WHERE REF_STU = '".$id."'";
            $resultskill = mysqli_query($conn, $queryskill);
            while($rowskill = mysqli_fetch_array($resultskill))
			{
				echo "<li>";
					echo $rowskill['SKILL'];
				echo "</li>";
			}
			echo "</ul>";
            echo "<p>";
            echo "<b>Languages: </b>";
            echo "</p>";
            echo "<ul>";
            $querylang = "SELECT * FROM LANGUAGES WHERE LANG_ID IN (SELECT REF_LANG FROM STUDENT_LANGUAGE WHERE REF_STU = '".$id."')";
            $resultlang = mysqli_query($conn, $querylang);
            while($rowlang = mysqli_fetch_array($resultlang))
			{
                echo "<li>";
                	echo $rowlang['LANGUAGE'];
                echo "</li>";
			}
			echo "</ul>";

            echo "<br />";
		}
?>
