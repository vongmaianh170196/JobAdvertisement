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
//     && isset($_POST["jobDescription"])
){
    if(isset($_SESSION["employer"])){
        $query ="INSERT INTO ADVERTISEMENT( DATE_OF_PUBLISH, TITLE, DEADLINE, CONTACT, REQUIREMENT, FURTHER_INFO, NUMBER_OF_VACCANCIES, REF_COMP) VALUES 
(NOW(),'".$_POST["title"]."','".$_POST["deadLine"]."','".$_POST["contact"]."', '".$_POST["jobDescription"]."','".$_POST["furtherInformation"]."','".$_POST["numberOfVaccancies"]."','".$ref_com."');";
        mysqli_query($conn, $query);
    }else{

        $query ="INSERT INTO ADVERTISEMENT( DATE_OF_PUBLISH, TITLE, DEADLINE, CONTACT, REQUIREMENT, FURTHER_INFO, NUMBER_OF_VACCANCIES) VALUES 
(NOW(),'".$_POST["title"]."','".$_POST["deadLine"]."','".$_POST["contact"]."', '".$_POST["jobDescription"]."','".$_POST["furtherInformation"]."','".$_POST["numberOfVaccancies"]."');";
        mysqli_query($conn, $query);
    }


//       echo "<br>";
//       echo "insert duoc roi";
//   }

    echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.location.href='index.php'
        </SCRIPT>");
}

