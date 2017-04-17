<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="css/style_login.css">
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
<br></br>
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

<?php
include_once ('includes/header.php');
?>

<div class="container">
    <div class="student">
        <h1>Student </h1>
        <hr>
        <img class="btn-employer" src="https://cdn2.iconfinder.com/data/icons/employment-business-2/256/Businessman_and_globe-512.png" alt="Employer">
        <img class="btn-student active" src="https://image.freepik.com/freie-ikonen/graduierung_318-1944.jpg" alt="Student">

        <form  method="post" action="join.php">
            <!--             <label for="stu_usn">Username:</label> -->
            <input type="text" id="username" name="stu_usn" placeholder="Username">
            <br>
            </br>
            <!--             <label for="stu_pass">Password:</label> -->
            <input type="password" id="password" name="stu_pass" placeholder="Password">
            <br>

            <button class="btn-login" type="submit">Log in</button>

        </form>
    </div>
    <div class="employer">

        <h1>Employer </h1>
        <hr>
        <img class="btn-employer active" src="https://cdn2.iconfinder.com/data/icons/employment-business-2/256/Businessman_and_globe-512.png" alt="Employer">
        <img class="btn-student" src="https://image.freepik.com/freie-ikonen/graduierung_318-1944.jpg" alt="Student">


        <form method="post" action="join.php">
            <!--             <label for="emp_usn">Username:</label> -->
            <input type="text" id="username" name="emp_usn" placeholder="UserName">
            <br>
            </br>
            <!--             <label for="emp_pass">Password:</label> -->
            <input type="password" id="password" name="emp_pass" placeholder="Password">
            <br>
            <button class="btn-login" type="submit">Log in</a></button>
        </form>
    </div>
</div>
<p class="note">No account yet? <a href="register.php">Please Sign up!</a></p>
</div>    <!----------
      END CONTENT
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

<script
        src="https://code.jquery.com/jquery-3.1.1.js"
        integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
        crossorigin="anonymous"></script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/login.js" type="text/javascript" charset="utf-8"></script>
</body>



</html>