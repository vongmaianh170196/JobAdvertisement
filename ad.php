<?php
include ('includes/config.php');
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
if(isset($_SESSION["employer"])){
    $query = "SELECT * FROM COMPANY WHERE COMP_USERNAME = '" . $_SESSION['employer']."';";
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result)){
        $ref_com= $row['ID_COMP'];
        echo $ref_com;
    }
}
if (isset($_POST["deadLine"])
    && isset($_POST["title"])
    && isset($_POST["contact"])
    && isset($_POST["jobDescription"])
    and strlen($_POST["deadLine"]) >=1 &&
    strlen($_POST["title"]) >=1 &&
    strlen($_POST["contact"]) >=1 &&
    strlen($_POST["jobDescription"]) >=1)

    {
            echo $_POST["deadLine"].$_POST["title"].$_POST["jobDescription"];
            if(isset($_SESSION["employer"]))
            {
                $query ="INSERT INTO ADVERTISEMENT( DATE_OF_PUBLISH, TITLE, DEADLINE, CONTACT, REQUIREMENT, FURTHER_INFO, NUMBER_OF_VACCANCIES, REF_COMP) VALUES 
        (NOW(),'".$_POST["title"]."','".$_POST["deadLine"]."','".$_POST["contact"]."', '".$_POST["jobDescription"]."','".$_POST["furtherInformation"]."','".$_POST["numberOfVaccancies"]."','".$ref_com."');";
               $inserted= mysqli_query($conn, $query);
                   if($inserted)
                   {
                   echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Successful')
                    window.location.href='index.php'
                    </SCRIPT>");
                   }
            }
            else
                {
                $query ="INSERT INTO ADVERTISEMENT( DATE_OF_PUBLISH, TITLE, DEADLINE, CONTACT, REQUIREMENT, FURTHER_INFO, NUMBER_OF_VACCANCIES) VALUES 
        (NOW(),'".$_POST["title"]."','".$_POST["deadLine"]."','".$_POST["contact"]."', '".$_POST["jobDescription"]."','".$_POST["furtherInformation"]."','".$_POST["numberOfVaccancies"]."');";
                 $inserted= mysqli_query($conn, $query);
                    if($inserted)
                    {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Successful')
                    window.location.href='index.php'
                    </SCRIPT>");
                    }
                }


    }
// If editing instead of creating:
elseif (isset($_POST["deadLineEdit"])
    && isset($_POST["titleEdit"])
    && isset($_POST["contactEdit"])
    && isset($_POST["jobDescriptionEdit"])
    and strlen($_POST["deadLineEdit"]) >=1 &&
    strlen($_POST["titleEdit"]) >=1 &&
    strlen($_POST["contactEdit"]) >=1 &&
    strlen($_POST["jobDescriptionEdit"]) >=1)
{
    // Unfinished
    $deadlineEdit = $_POST["deadLineEdit"];
    $stmt = $conn->prepare("UPDATE ADVERTISEMENT SET TITLE = ?, DEADLINE = ?, CONTACT = ?, REQUIREMENT = ?, FURTHER_INFO = ?, NUMBER_OF_VACCANCIES = ? WHERE ID_ADV = ?");
    $stmt->bind_param("sssssii"); // Does string work with datetime?
}

else
    {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('please fill required fields')
        window.location.href='postad.php'
        </SCRIPT>");
    }

