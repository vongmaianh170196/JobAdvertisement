<?php
include 'includes/config.php';
session_start();
if(isset($_GET['expand'])){

    $query= "SELECT * FROM `ADVERTISEMENT` WHERE DEADLINE > NOW() AND ID_ADV ='".$_GET['expand']."'";

    $result = mysqli_query($conn,$query);

if ($row = mysqli_fetch_array($result)){

//}
//    while($row = mysqli_fetch_array($result))
//    {
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

    <div id="nav">

        <!-----------
        wrap-nav
        ------------->
        <div class="wrap-nav">
            <!--search-->
            <div class="search">
                <a class="linkbutton" href="index.php">Home page</a>
                <form action="http://google.com"/>
                <input type="text" name="search" placeholder="Job...">
                <input type="text" name="search" placeholder="Location...">
                <input type="submit" value="Find"/>
                <!--          Display username-->
                <span > <?php
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
            <?php
                if (isset($_SESSION['admin'])){ ?>
                <div>
                    <ul>
                        <li><button>Edit</button></li>
                        <li><button>Delete</button></li>
                    </ul>
                </div>
            <?php } ?>
        </div>
        <!----------
          SIDE-NAV
      ---------->
        <div id="side-nav">

        </div>


        <!----------
          END SIDE-NAV
      ---------->

        <!----------
          CONTENT
      ---------->
        <div id="content">
<?php

        $value = $row['TITLE'];

        echo '<div class=\"advertisement\">';

        echo    '<h1>'.$value.'</h1>';
        echo '<p>Location: Across all offices </p>';
        echo   "<p>Application deadline: ". finnish_dateformat($row['DEADLINE'])."</p>
          <p>Requirement: ".$row['REQUIREMENT']."</p>
          <p>Futher Info : ".$row['FURTHER_INFO']."</p>


        </div>
      </div>";
    ?>
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
    <?php
    }
    else{
        echo 'No job available here';
    }

}