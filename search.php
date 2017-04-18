<?php
include ('includes/config.php');
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

if(!isset($_GET['job']) && !isset($_GET['location']) && !isset($_GET['job_type']))
{
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Job advertisement project</title>

    <link rel="shortcut icon" href="http://www.freeiconspng.com/uploads/snow-icon-5.png" type="image/x-icon" />
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">


</head>
<body onload=content_ajax() id="overlay" >
<!----------
    NAVIGATION
    ---------->

<?php
include_once ('includes/header.php');
?>
<!----------
    CONTAINER
    ---------->
<div id="container">
    <div>
    <?php
    if (isset($_GET['job']) && isset($_GET['location']))
    {
        $jobtext = $_GET['job'];
        $joblocation = $_GET['location'];

        if ($_GET['job'] != "" && $_GET['location'] == "") // Only job is set
        {
            $query = "SELECT * FROM ADVERTISEMENT WHERE (UPPER(TITLE) LIKE UPPER('%".$jobtext."%') OR UPPER(REQUIREMENT) LIKE UPPER('%".$jobtext."%') OR UPPER(FURTHER_INFO) LIKE UPPER('%".$jobtext."%')) AND DEADLINE >= NOW()";
            $result = mysqli_query($conn, $query);

            include_once ('includes/adloop.php');
        }
        else if ($_GET['job'] == "" && $_GET['location'] != "") // Only location is set
        {
            $query = "SELECT * FROM ADVERTISEMENT WHERE (UPPER(LOCATION) LIKE UPPER('%".$joblocation."%')) AND DEADLINE >= NOW()";
            $result = mysqli_query($conn, $query);

            include_once ('includes/adloop.php');
        }
        else if ($_GET['job'] != "" && $_GET['location'] != "") // Both are set
        {
            $query = "SELECT * FROM ADVERTISEMENT WHERE ((UPPER(TITLE) LIKE UPPER('%".$jobtext."%') OR UPPER(REQUIREMENT) LIKE UPPER('%".$jobtext."%') OR UPPER(FURTHER_INFO) LIKE UPPER('%".$jobtext."%')) AND UPPER(LOCATION) LIKE UPPER('%".$joblocation."%')) AND DEADLINE >= NOW()";
            $result = mysqli_query($conn, $query);

            include_once ('includes/adloop.php');
        }
    }
    else if (isset($_GET['job_type']))
    {
        $query = "SELECT * FROM ADVERTISEMENT WHERE JOB_TYPE = '".$_GET['job_type']."'";
        $result = mysqli_query($conn, $query);

        include_once ('includes/adloop.php');
    }


    ?>
    </div>
</div> <!-- END CONTAINER -->

<div id="footer">
    <div class="wrap-footer">

        <div class="icon-footer">
            <a href="http://google.com"><img src="https://image.flaticon.com/icons/png/512/145/145804.png"></a>
            <a href="http://twitter.com"><img src="https://image.flaticon.com/icons/png/512/145/145812.png"></a>
            <a href="http://facebook.com"><img src="https://image.flaticon.com/icons/png/512/145/145802.png"></a>
        </div>
        <!--icon-footer -->


        <div class="About-us">
            <p>
                <a href="aboutus.html">About us</a>
            </p>
            <hr>

            <ul>
                <li><a href="aboutus.html">What we do</a></li>
                <li><a href="#">Team members</a></li>
                <li><a href="#">Contact us</a></li>
            </ul>
        </div>
        <!--About-us -->

        <div>
            <p>
                For Companies
            </p>
            <hr>

            <ul>
                <li><a href="#">What we do</a></li>
                <li><a href="#">Post a job</a></li>
                <li><a href="#">What we do</a></li>
            </ul>
        </div>
        <!--  For Companies -->

        <div>
            <p>
                For Job Seekers
            </p>
            <hr>

            <ul>
                <li><a href="#">What we do</a></li>
                <li><a href="#">Team members</a></li>
                <li><a href="#">What we do</a></li>
            </ul>
        </div>
        <!-- For Job Seekers -->

    </div>
    <!-- wrap footer -->


</div>
<!----------
END FOOTER
---------->

<div class="mini-footer">
    Job Advertisement Project
</div>
<!--<script src="js/index.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.0.js"></script>
	<script src="js/app.js" type="text/javascript" charset="utf-8"></script>


    <script src="js/index.js"></script>
<script>function content_ajax() {

        $.ajax({
                url: "getAd.php"
                , type: "get"
                , dateType: "text"
                , success: function (result) {

                    $(".results").html(result)
                }
            }
        )
    }</script>



  <script src="js/app.js" type="text/javascript" charset="utf-8"></script>
  <script src="js/index.js"></script>-->

<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.0.js"></script>
<script src="js/app.js" type="text/javascript" charset="utf-8"></script>
<script src="js/index.js" type="text/javascript" charset="utf-8"></script>
<script>function content_ajax() {

        $.ajax({
                url: "getAd.php"
                , type: "get"
                , dateType: "text"
                , success: function (result) {

                    $(".results").html(result)
                }
            }
        )
    }
</script>
</body>
</html>
