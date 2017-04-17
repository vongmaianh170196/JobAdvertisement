<?php
include ('includes/config.php');
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Job advertisement project</title>

    <link rel="shortcut icon" href="http://www.freeiconspng.com/uploads/snow-icon-5.png" type="image/x-icon" />
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body onload=getClickableLinks() id="overlay">
<!----------
  NAVIGATION
  ---------->
<div id="nav">
    <!-----------
wrap-nav
------------->
    <div class="wrap-nav">
        <!--search-->
        <div class="search">
            <a class="linkbutton" href="index.php">Home page</a>
            <!--<form action="http://google.com" />-->
            <input type="text" name="search" placeholder="Job...">
            <input type="text" name="search" placeholder="Location...">
            <input type="submit" value="Find" />
            <!--          Display username-->
            <span> <?php
                if (!isset($_SESSION['username'])){
                    echo 'Username will be displayed here after login';
                }
                else{
                    echo $_SESSION['username'];
                }
                ?>
          </span>
            <!--          /Display username-->
        </div>

        <!--END --search-->


        <!--Login -->
        <div class="login">
            <ul>
                <?php
                if (isset($_SESSION['employer'])){ ?>
                    <li><a class="linkbutton" href="postad.php">Post a Job</a></li>
                    <li><a class="linkbutton" href="students.php">Search Students</a></li>
                <?php } ?>

                <?php
                if (isset($_SESSION['student'])){ ?>
                    <li><a class="linkbutton" href="profile.php">Profile</a></li>
                <?php } ?>
                <li>
                <li>
                    <!--              log in log out-->
                    <?php

                    if (!isset($_SESSION['username'])){
                        echo '<a class="linkbutton" href="login.php">Login</a>';
                    }
                    else{
                        echo '<a class="linkbutton" href="logout.php">Logout</a>';
                    }
                    ?>
                    <!--              /log in log out-->
                </li>
                <?php
                if (!isset($_SESSION['username'])){
                    echo '<li><a class="linkbutton" href="register.php">Register</a></li>';
                }
                ?>
            </ul>
        </div>
        <!--END login-->
    </div>
    <!-- END wrap-nav -->
</div>
<!--END NAV -->
<!--BANNER -->
<div id="banner">
    <img src="https://s10.postimg.org/mi0h0mg55/Untitled-2.jpg">
</div>
<!--END BANNER-->

<!----------
  CONTAINER
  ---------->

<div id="container" >

    <!----------
  CONTAINER
  ---------->
    <div class="nav2">
        <?php
        if (!isset($_SESSION['username']) || isset($_SESSION['student']) ){
            echo "This page is for employers only.";
        }
        else if(isset($_SESSION['employer']) || isset($_SESSION['admin'])) {

        ?>

    </div>
    <!----------
  SIDE-NAV
---------->
    <div id="side-nav">
        <h3>Search students</h3>
        <div class="searchoption">
            <p>Per degree</p>
            <form id="degreesearch" method="post" action="students.php">
                <select name="degreesearch">
                        <option value="Bachelor's Degree">Bachelor's Degree</option>
                        <option value="Master's Degree">Master's Degree</option>
                        <option value="Doctorate">Doctorate</option>
                </select>
                <br>
                <button type="submit" value="Submit">Submit</button>
            </form>
        </div>

        <div class="searchoption">
            <p>Per language</p>
            <form id="langsearch" method="post" action="students.php">
                <select name="langsearch">
                <?php
                // Fetch languages
                $query = "SELECT LANGUAGE FROM LANGUAGES";
                $result = mysqli_query($conn, $query);
                while($row = mysqli_fetch_array($result))
                {
                    $listlanguage = $row['LANGUAGE'];
                ?>
                    <option value="<?php echo $listlanguage; ?>"><?php echo $listlanguage; ?></option>
                <?php
                    }
                ?>
                </select>
                <br>
                <button type="submit" value="Submit">Submit</button>
            </form>
        </div>

        <div class="searchoption">
            <p>Per skill</p>
            <form id="skillsearch" method="post" action="students.php">
                <input type="text" name="skillsearch" required="required" />
                <br>
                <button type="submit" value="Submit">Submit</button>
            </form>
        </div>

    </div>
    <!----------
  END SIDE-NAV
---------->

    <!----------
  CONTENT
---------->
    <div id="content">
        

        <div class="contentbox" id="allstudentsbox">
        <a class="linkbutton" href="students.php">All students</a>
          <br>
          </br>
            <?php
            if (isset($_POST['degreesearch']))
            {
                $degree = $_POST['degreesearch'];
                $query = "SELECT * FROM STUDENT_INFO WHERE DEGREE = '".$degree."' ORDER BY LASTNAME, FIRSTNAME";
                $result = mysqli_query($conn,$query);
                echo "<h2>Students with degree: '".$degree."'</h2>";
                include_once ('includes/studentloop.php'); // The while loop of echoing
            }
            else if (isset($_POST['langsearch']))
            {
                $language = $_POST['langsearch'];
                $query = "SELECT * FROM STUDENT_INFO WHERE REF_STUDENT IN (SELECT REF_STU FROM STUDENT_LANGUAGE WHERE REF_LANG = (SELECT LANG_ID FROM LANGUAGES WHERE LANGUAGE = '".$language."'))";
                $result = mysqli_query($conn,$query);
                echo "<h2>Students with language: '".$language."'</h2>";
                include_once ('includes/studentloop.php');
            }
            else if (isset($_POST['skillsearch']))
            {
                $skill = $_POST['skillsearch'];
                $query = "SELECT * FROM STUDENT_INFO WHERE REF_STUDENT IN (SELECT REF_STU FROM STUDENT_SKILL WHERE SKILL = '".$skill."')";
                $result = mysqli_query($conn,$query);
                echo "<h2>Students with skill: '".$skill."'</h2>";
                include_once ('includes/studentloop.php');
            }
            else
            {
                $query = "SELECT * FROM STUDENT_INFO ORDER BY LASTNAME, FIRSTNAME";
                $result = mysqli_query($conn,$query);
                echo "<h2>All students alphabetically</h2>";
                include_once ('includes/studentloop.php');
            }
            ?>
        </div>

    </div>
    <?php
    }
    ?>
    <!----------
  END CONTENT
---------->

</div>
<!----------
  END CONTAINER
---------->
<div class="push">
</div>
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


<script src="http://code.jquery.com/jquery-1.11.0.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/app.js" type="text/javascript" charset="utf-8"></script>

<script src="js/index.js"></script>
<script src="js/students.js"></script>

</body>
</html>