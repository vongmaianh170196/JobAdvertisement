<?php
include ('includes/config.php');

ini_set('display_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['regstu_usn']) and isset($_POST['regstu_pass']) and isset($_POST['regstu_email'])){
    if ($_POST['regstu_usn']=='' or $_POST['regstu_pass'] =='' or $_POST['regstu_email'] ==''){
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert(\"Please fill in username, password and email address.\")
        window.location.href='register.php'
        </SCRIPT>");
    }
    else{
        $username = $_POST['regstu_usn'];
        $password = md5($_POST['regstu_pass']);
        $email = $_POST['regstu_email'];

        $stmt = $conn->prepare("INSERT INTO STUDENT (STU_USERNAME, STU_PASSWORD, EMAIL) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $password, $email);

        if($stmt->execute()){
            echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert(\"Account registered successfully! Welcome, ".$_POST['regstu_usn']."!\")
			window.location.href='index.php'
			</SCRIPT>");
        }
        else{
            echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert(\"This username has been taken!\")
			window.location.href='register.php'
			</SCRIPT>");
        }



        $stmt->close();
    }
}
else if (isset($_POST['regemp_usn']) and isset($_POST['regemp_pass']) and isset($_POST['regemp_email']) and isset($_POST['regemp_comp']) and isset($_POST['regemp_loc'])){
    if ($_POST['regemp_usn']=='' or $_POST['regemp_pass'] =='' or $_POST['regemp_email'] =='' or $_POST['regemp_comp'] =='' or $_POST['regemp_loc'] ==''){
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert(\"Please fill in username, password, email address, company name and company location.\")
        window.location.href='register.php'
        </SCRIPT>");
    }
    else{
        $username = $_POST['regemp_usn'];
        $password = md5($_POST['regemp_pass']);
        $email = $_POST['regemp_email'];
        $company = $_POST['regemp_comp'];
        $location = $_POST['regemp_loc'];

        $stmt = $conn->prepare("INSERT INTO COMPANY (COMP_USERNAME, COMP_PASSWORD, COMPANY_NAME, LOCATION, CONTACT) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $username, $password, $company, $location, $email);

        if($stmt->execute()){
            echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert(\"Account registered successfully! Welcome, ".$_POST['regemp_usn']."!\")
window.location.href='index.php'
			</SCRIPT>");
            /*?>
                <form method="POST" action="join.php">
                    <input type="hidden" id="username" name="emp_usn" value="<?php echo $username; ?>">
                    <input type="hidden" id="password" name="emp_pass" value="<?php echo $password; ?>">
                </form>
            <?php*/
        }
        else{
            echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert(\"This username has been taken!\")
			window.location.href='register.php'
			</SCRIPT>");
        }


        $stmt->close();
    }

}
?>