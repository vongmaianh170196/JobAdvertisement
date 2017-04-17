<?php
include ('includes/config.php');
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
echo 'memome';
echo $_POST['skills'];

if(isset($_POST['skills'])){
    $skillsArr= $_POST['skills'];
    $IdQuery = "SELECT ID FROM STUDENT WHERE STU_USERNAME = '".$_SESSION['username']."'";
    $result = mysqli_query($conn,$IdQuery);
    while ($row= mysqli_fetch_array($result)){
        $stu_id = $row['ID'];
        $_SESSION['stu_id']= $stu_id;
    }
    echo 'nhan duoc data';
    if(is_array($skillsArr)){
        $deleteQuery = "DELETE FROM STUDENT_SKILL WHERE REF_STU='".$stu_id."';";
        $result = mysqli_query($conn, $deleteQuery);
        foreach($skillsArr as $skill){

            $query = "INSERT INTO STUDENT_SKILL (SKILL, REF_STU) values ('".$skill."', '".$stu_id."')";
            $result = mysqli_query($conn, $query);
        }
    }
}

