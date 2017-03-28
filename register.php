<?php

include ('includes/config.php');

?>


<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register an Account</title>

    <link rel="stylesheet" href="css/normalize.css">

    <link rel="stylesheet" href="css/style_signup.css">

</head>

<body>




<div class="container">
    <div class="student">
        <h1>Student</h1>
        <hr>
        <div class="option">

            <img class="btn-employer" src="https://cdn2.iconfinder.com/data/icons/employment-business-2/256/Businessman_and_globe-512.png"
                 alt="Employer">
            <img class="btn-student active" src="https://image.freepik.com/freie-ikonen/graduierung_318-1944.jpg" alt="Student">

        </div>
        <!-- option-->


        <form method="post" action="save.php">
            <label for="regstu_usn">Username:</label>

            <input type="text" id="reg_username" name="regstu_usn">


            <div class="password">
                <label for="regstu_pass">Password:</label>
                <input id="reg_password" type="password"  name="regstu_pass">
                <span>Enter a password longer than 8 characters</span>
            </div>
            <br>

            <div class="confirm-password">
                <label for="confirm-password">Confirm Password:</label>
                <input type="password" id="confirm-password" name="confirm-password">
                <span>Please confirm your password</span>
            </div>
            <br>

            <label for="regstu_email">Email address:</label>
            <input type="email" id="reg_email" name="regstu_email">
            <br></br>

            <button class="signUp-btn" type="submit">Sign up</button>
    </div>
    </form>



    <div class="employer">
        <h1>Employer </h1>
        <hr>
        <div class="option">
            <img class="btn-employer active" src="https://cdn2.iconfinder.com/data/icons/employment-business-2/256/Businessman_and_globe-512.png"
                 alt="Employer">
            <img class="btn-student" src="https://image.freepik.com/freie-ikonen/graduierung_318-1944.jpg" alt="Student">
        </div>
        <form method="post" action="save.php">

            <label for="regemp_usn">Username:</label>
            <input type="text" id="reg_username" name="regemp_usn">

            <div class="password">
                <label for="regemp_pass">Password:</label>
                <input id="password" type="password" name="regemp_pass">
                <span>Enter a password longer than 8 characters</span>
            </div>
            <br>
            <div class="confirm-password">
                <label for="confirm-password">Confirm Password:</label>
                <input id="confirm_password" type="password"  name="confirm-password">
                <span>Please confirm your password</span>
            </div>
            <br>

            <label for="regemp_email">Email address:</label>
            <input type="email" id="reg_email" name="regemp_email">

            <label for="regemp_comp">Company:</label>
            <input type="text" id="reg_company" name="regemp_comp">

            <label for="regemp_loc">Company location:</label>
            <input type="text" id="reg_location" name="regemp_loc">

            <button class="signUp-btn" type="submit">Sign up</button>
    </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/register.js" type="text/javascript" charset="utf-8"></script>


    <p class="note">Already have an account? <a href="login.php">Log In!</a></p>

    <br />
    <p class="note">19.2.2017</p>


    <script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/sign-up.js" type="text/javascript" charset="utf-8"></script>


</body>

</html>