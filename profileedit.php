<?php
include ('includes/config.php');
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

/////// Edit profile information (TO BE ADDED: skills, language skills)
if(isset($_POST['fname']) and isset($_POST['lname']) and isset($_POST['faculty']) and isset($_POST['degree']) and isset($_POST['years']) and isset($_POST['months']) and isset($_POST['profiletext']))
{
    if ($_POST['fname']=='' or $_POST['lname']=='')
    {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert(\"Please fill in the details\")
        window.location.href='profile.php'
        </SCRIPT>");
    }
    else
    {
        // Calculating the total number of months
        $years = $_POST['years'];
        $months = $_POST['months'];
        $months = $years * 12 + $months;

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $faculty = $_POST['faculty'];
        $degree = $_POST['degree'];
        $stu_username = $_SESSION['username'];
        $profiletext = $_POST['profiletext'];

        // Getting id from database, could be used for lots of stuff
        $stmt = $conn->prepare("SELECT ID FROM STUDENT WHERE STU_USERNAME = ?");
        $stmt->bind_param("s", $stu_username);
        $stmt->execute();
        $stmt->bind_result($idDb);
        while ($stmt->fetch())
        {
            echo '<p style="display: none;">'.$idDb.'</p>';
        }

        // Language stuff goes separately
        foreach($_POST["language"] as $lang)
        {
            $query = "INSERT INTO STUDENT_LANGUAGE (REF_STU, REF_LANG) SELECT '.$idDb.', LANG_ID FROM LANGUAGES WHERE LANGUAGE = '.$lang.'";
            mysqli_query($conn,$query);
        }

        // Inserting student_info stuff
        $stmt = $conn->prepare("INSERT INTO STUDENT_INFO (FIRSTNAME, LASTNAME, FACULTY, DEGREE, WORK_EXPERIENCE, PROFILE_TEXT, REF_STUDENT) SELECT ?, ?, ?, ?, ?, ?, ID FROM STUDENT WHERE STU_USERNAME = ?");
        $stmt->bind_param("sssssss", $fname, $lname, $faculty, $degree, $months, $profiletext, $stu_username);

        if($stmt->execute()) // Creates new line in STUDENT_INFO for this user's details
        {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert(\"Profile info added successfully!\")
			window.location.href='index.php'
			</SCRIPT>");
        }
        else // If new profile info doesn't get created, tries updating because an existing one might exist.
        {
            $stmt = $conn->prepare("UPDATE STUDENT_INFO SET FIRSTNAME = ?, LASTNAME = ?, FACULTY = ?, DEGREE = ?, WORK_EXPERIENCE = ?, PROFILE_TEXT = ? WHERE REF_STUDENT IN (SELECT ID FROM STUDENT WHERE STU_USERNAME = ?)");
            $stmt->bind_param("sssssss", $fname, $lname, $faculty, $degree, $months, $profiletext, $stu_username);

            if($stmt->execute())
            {
                echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert(\"Profile edited successfully!\")
				window.location.href='index.php'
				</SCRIPT>");
            }
            else
            {
                echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert(\"Something went wrong!\")
				window.location.href='register.php'
				</SCRIPT>");
            }
            $stmt->close();
        }
    }
}

/////// Change password ///////
else if(isset($_POST['currentpasswd']) and isset($_POST['newpasswd']) and isset($_POST['newpasswdrepeat']))
{
    if ($_POST['currentpasswd']=='' or $_POST['newpasswd']=='' or $_POST['newpasswdrepeat']=='')
    {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert(\"Please fill in the details\")
        window.location.href='profile.php'
        </SCRIPT>");
    }
    else
    {
        if ($_POST['newpasswd'] != $_POST['newpasswdrepeat'])
        {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert(\"New password not repeated correctly!\")
			window.location.href='profile.php'
			</SCRIPT>");
        }
        else
        {
            $currentpasswd = md5($_POST['currentpasswd']);
            $newpasswd = md5($_POST['newpasswd']);
            $stu_username = $_SESSION['username'];

            //Fetches the current password from database
            $stmt = $conn->prepare("SELECT STU_PASSWORD FROM STUDENT WHERE STU_USERNAME = ?");
            $stmt->bind_param("s", $stu_username);
            $stmt->execute();
            $stmt->bind_result($realpasswd);
            while ($stmt->fetch())
            {
                echo '<p style="display: none;">'.$realpasswd.'</p>';
            }

            // Below: if 'currentpasswd' matches the current password in db, then change it into 'newpasswd'
            // If 'currentpasswd' doesn't match the one in db, the old one remains
            $stmt = $conn->prepare("UPDATE STUDENT SET STU_PASSWORD = CASE 
				WHEN STU_PASSWORD = ? THEN ?
				ELSE STU_PASSWORD
				END WHERE STU_USERNAME = ?");
            $stmt->bind_param("sss", $currentpasswd, $newpasswd, $stu_username);
            $stmt->execute();
            $stmt->close();

            $stmt = $conn->prepare("SELECT STU_PASSWORD FROM STUDENT WHERE STU_USERNAME = ?");
            $stmt->bind_param("s", $stu_username);
            $stmt->execute();
            $stmt->bind_result($checkpasswd);
            while ($stmt->fetch())
            {
                echo '<p style="display: none;">'.$checkpasswd.'</p>';
            }
            if ($checkpasswd == $realpasswd) // If the db password is still the same as before, that means it wasn't changed
            {
                echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert(\"Password not changed!\")
				window.location.href='profile.php'
				</SCRIPT>");
            }
            else
            {
                echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert(\"Password changed!\")
				window.location.href='profile.php'
				</SCRIPT>");
            }
            $stmt->close();
        }
    }
}

/////// Change email address /////// unfinished
else if(isset($_POST['currentemail']) and isset($_POST['newemail']) and isset($_POST['passwd']))
{
    if ($_POST['currentemail']=='' or $_POST['newemail']=='' or $_POST['passwd']=='')
    {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert(\"Please fill in the details\")
        window.location.href='profile.php'
        </SCRIPT>");
    }
    else
    {
        $currentemail = $_POST['currentemail'];
        $newemail = $_POST['newemail'];
        $passwd = md5($_POST['passwd']);
        $stu_username = $_SESSION['username'];

        //Fetches the current email from database
        $stmt = $conn->prepare("SELECT EMAIL FROM STUDENT WHERE STU_USERNAME = ?");
        $stmt->bind_param("s", $stu_username);
        $stmt->execute();
        $stmt->bind_result($realemail);
        while ($stmt->fetch())
        {
            echo '<p style="display: none;">'.$realemail.'</p>';
        }
        // Updates db with new email if current email matches. Otherwise don't change anything
        $stmt = $conn->prepare("UPDATE STUDENT SET EMAIL = CASE 
				WHEN EMAIL = ? AND STU_PASSWORD = ? THEN ?
				ELSE EMAIL
				END WHERE STU_USERNAME = ?");
        $stmt->bind_param("ssss", $currentemail, $passwd, $newemail, $stu_username);
        $stmt->execute();

        $stmt = $conn->prepare("SELECT EMAIL FROM STUDENT WHERE STU_USERNAME = ?");
        $stmt->bind_param("s", $stu_username);
        $stmt->execute();
        $stmt->bind_result($checkemail);
        while ($stmt->fetch())
        {
            echo '<p style="display: none;">'.$checkemail.'</p>';
        }
        if ($checkemail == $realemail) // If the db email is still the same as before, that means it wasn't changed
        {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert(\"Email address not changed!\")
			window.location.href='profile.php'
			</SCRIPT>");
        }
        else
        {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert(\"Email address changed!\")
			window.location.href='profile.php'
			</SCRIPT>");
        }
        $stmt->close();
    }
}

/////// Delete profile ///////
else if (isset($_POST['passwdDel']))
{
    $passwdDel = md5($_POST['passwdDel']);
    $stu_username = $_SESSION['username'];

    $stmt = $conn->prepare("SELECT COUNT(*) as total FROM STUDENT WHERE STU_USERNAME = ? AND STU_PASSWORD = ?");
    $stmt->bind_param("ss", $stu_username, $passwdDel);
    $stmt->execute();

    $count = null;
    $stmt->bind_result($count);
    while ($stmt->fetch())
    {
        echo '<p style="display:none;">Found {$count} </p>';
    }
    if ($count == 1) // One username&password match found
    {
        $stmt = $conn->prepare("DELETE FROM STUDENT WHERE STU_USERNAME = ? AND STU_PASSWORD = ?");
        $stmt->bind_param("ss", $stu_username, $passwdDel);
        $stmt->execute();

        echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert(\"Account deleted!\")
			window.location.href='logout.php'
			</SCRIPT>");
    }
    else
    {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert(\"Wrong password!\")
			window.location.href='profile.php'
			</SCRIPT>");
    }
}

?>