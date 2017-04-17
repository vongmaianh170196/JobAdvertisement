
<?php
include ('includes/config.php');
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
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

    <!----------
      CONTAINER
      ---------->
    <div class="nav2">
        <div>
            <ul>
                <li><a href="#">All</a></li>
                <li><a href="#">Part-time Job</a></li>
                <li><a href="#">Full-time Job</a></li>
                <li><a href="#">Summer-time Job</a></li>
            </ul>
        </div>
    </div>
    <!----------
      SIDE-NAV
  ---------->
    <div id="side-nav">
        <div class="Job-Type">
            <p>JOB TYPE</p>
            <hr>

            <ul>
                <li><a href="#">Front-end</a></li>
                <li><a href="#">Back-end</a></li>
                <li><a href="#">Web-design</a></li>

                <span class="Job-Type-hide">
           <span class="1">
              <li><a href="#">Javasript Fullstack</a></li>
              <li><a href="#">Data security</a></li>
              <li><a href="#">Network</a></li>            
            </span>
          </span>


            </ul>
        </div>

        <div class="SKILLS">
            <p>SKILLS</p>
            <hr>

            <ul>
                <li><a href="#">C#</a></li>
                <li><a href="#">Java</a></li>
                <li><a href="#">Php</a></li>

                <span class="SKILLS-hide">
            <span class="2">
              <li><a href="#">Javasript</a></li>
              <li><a href="#">Ruby on Rails</a></li>
              <li><a href="#">Node.js</a></li>
            </span>
          <span>
            </ul>
        </div>

        <div class="Job-Type">
            <p>LOCATION</p>
            <hr>

            <ul>
                <li><a href="#">Helsinki</a></li>
                <li><a href="#">Tampere</a></li>
                <li><a href="#">Lahti</a></li>

                <span class="LOCATION-hide">
            <span class="3">
              <li><a href="#">Turku</a></li>
              <li><a href="#">Oulu</a></li>
              <li><a href="#">Porvoo</a></li>
            </span>
          <span>
            </ul>
        </div>

        <div class="Job-Type">
            <p>LANGUAGES</p>
            <hr>

            <ul>
                <li><a href="#">English</a></li>
                <li><a href="#">Finnish</a></li>
                <li><a href="#">Danish</a></li>
                <span class="LANGUAGES-hide">
            <span class="4">
              <li><a href="#">Germany</a></li>
              <li><a href="#">Swedish</a></li>
              <li><a href="#">Norweigian</a></li>
            </span>
          <span>
            </ul>
        </div>

    </div>


    <!----------
      END SIDE-NAV
  ---------->

    <!----------
      CONTENT
  ---------->
    <div id="content">
        <div class="results">

        </div>
    </div>

    <!----------
      END CONTENT
  ---------->

    <!----
       STICKY FOOTER
    --->
    <div class="push"></div>
    <!----
        END STICKY FOOTER
    --->
</div>
<!----------
    CONTAINER
---------->

<!----------
    FOOTER
---------->
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
