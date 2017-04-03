<?php
include ('includes/config.php');
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (isset($_SESSION['employer']))
{
    $user = $_SESSION['username'];
    $query = "SELECT * FROM COMPANY WHERE COMP_USERNAME ='".$user."'";
    $result = mysqli_query($conn, $query);
    // With these you can set default values to input fields based on the company's info on db
    while($row = mysqli_fetch_array($result))
    {
        $company_nameDb = $row['COMPANY_NAME'];
        $locationDb = $row['LOCATION'];
        $contactDb = $row['CONTACT'];
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <!--<link rel="stylesheet" href="css/postad.css">-->

</head>

<body id="overlay">
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
            <!--<form action="postad.php" />-->
            <input type="text" name="search" placeholder="Job...">
            <input type="text" name="search" placeholder="Location...">
            <input type="submit" value="Find" />
        </div>
        <!--END --search-->
    <!--Login -->
    <div class="login">
        <ul>
            <li><a class="linkbutton" href="postad.php">Post a Job</a></li>
            <?php
            if (isset($_SESSION['employer'])){ ?>
                <li><a class="linkbutton" href="students.php">Search Students</a></li>
            <?php } ?>

            <?php
            if (isset($_SESSION['student'])){ ?>
                <li><a class="linkbutton" href="profile.php">Profile</a></li>
            <?php } ?>
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



<div id="banner">
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/Lahti_harbour_panorama_2.jpg/1280px-Lahti_harbour_panorama_2.jpg">
</div>

<!----------
  CONTAINER
  ---------->

<div id="container">

    <!----------
  CONTAINER
  ---------->
    <div class="nav2">
        <!--nav2 -->
        <div>
            <?php
//            if (!isset($_SESSION['username']) ||isset($_SESSION['student']) ){
//                echo "Sorry You cannot access to this section. This is for employer only";
//            }
//            else if(isset($_SESSION['employer'])) {


                ?>

                <form action="ad.php" method="post">
                    <h1>POST A JOB</h1>
                    <br>
                    <br>
                    <br>
                    <!--

                                        <label for="postDate"><h2>Publish date:</h2></label>
                                        <input type="datetime-local" name="postDate">
                    -->

                    <label for="deadLine"><h2>Deadline:</h2></label>
                    <input type="date" name="deadLine">

                    <label for="title"><h2>Title:</h2></label>
                    <input type="text" name="title">

                    <label for="jobDescription"><h2>Job Description</h2></label>
                    <textarea id="" name="jobDescription" rows="20" cols="90"  placeholder="Your description...">
</textarea>

                    <label for="contact"><h2>Contact</h2></label>
                    <!--                    <input type="email" name="email">-->
                    <!--                    <input type="phone" name="phone">-->
                    <input type="text" name="contact" value="<?php echo htmlspecialchars($contactDb); ?>">

                    <label for="numberOfVaccancies"><h2>Number of vaccancies (Optional)</h2></label>
                    <input type="number" name="numberOfVaccancies">

                    <label for="furtherInformation"><h2>Further information (Optional)</h2>
                        <p class="optional">Optional</p></label>
                    <textarea id="" name="furtherInformation" rows="20" cols="90"
                              placeholder="Further information...">
</textarea>

                    <button id="submitAPost" type="submit">Submit</button>
                </form>

                <?php
//            }
            ?>



        </div>
    </div>
    <!--end nav2 -->



</div>
</div>

</div>
<!----------
  END CONTENT
---------->





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


<script src="http://code.jquery.com/jquery-1.11.0.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/app.js" type="text/javascript" charset="utf-8"></script>
</body>



</html>