<?php
include ('includes/config.php');
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
$IdQuery = "SELECT ID FROM STUDENT WHERE STU_USERNAME = '".$_SESSION['username']."'";
$result = mysqli_query($conn,$IdQuery);
while ($row= mysqli_fetch_array($result)){

    $_SESSION['stu_id']= $row['ID'];
}
// initialization in case no profile data exists yet
$firstnameDb = "";
$lastnameDb = "";
$monthsDb = 0;
$yearsDb = 0;
$profiletextDb = "";
// gets the data that user has previously submitted
// not included: degree and faculty, because not text fields
$query = "SELECT * FROM STUDENT_INFO WHERE REF_STUDENT ='".$_SESSION['stu_id']."'";
$result = mysqli_query($conn, $query);
while($row = mysqli_fetch_array($result))
{
    $firstnameDb = $row['FIRSTNAME'];
    $lastnameDb = $row['LASTNAME'];
    $profiletextDb = $row['PROFILE_TEXT'];
    // Calculates the years and months from the database's work experience column (which is just total months)
    $monthsDb = $row['WORK_EXPERIENCE'] % 12; // modulo
    $yearsDb = $row['WORK_EXPERIENCE'] - $monthsDb;
    $yearsDb = $yearsDb / 12; // division
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Student Profile</title>
    <link rel="stylesheet" href="css/style_profile.css" />
</head>

<body id="overlay">
<!----------
  NAVIGATION
  ---------->
<?php
include_once ('includes/header.php');
?>

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

>>>>>>> e8bda1de7b1ae0460d2e0412fb3b9ecfebd9aab8
<!----------
  CONTAINER
  ---------->

<div id="container" >

    <!----------
  CONTAINER
  ---------->
    <div class="nav2">
        <?php
        if (!isset($_SESSION['username']) ||isset($_SESSION['employer']) ){
            echo "This page is for students only.";
        }
        else if(isset($_SESSION['student'])) {


        ?>
        <div>
            <ul>
                <li><button onClick="editProfile()">Edit Profile</button></li>
                <li><button onClick="editAccount()">Edit Account</button></li>
            </ul>
        </div>
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
        
        <div class="contentbox" id="profilebox">
            <form id="infoform" method="post" action="profileedit.php">
                <h2>Edit profile information</h2>
                <table class="profileinfo">
                    <tr>
                        <td class="field_name">First name </td>
                        <td> <input type="text" name="fname" required="required" value="<?php echo htmlspecialchars($firstnameDb); ?>" /></td>
                    </tr>
                    <tr>
                        <td class="field_name">Last name </td>
                        <td> <input type="text" name="lname" required="required" value="<?php echo htmlspecialchars($lastnameDb); ?>" /></td>
                    </tr>
                    <tr>
                        <td class="field_name">Faculty </td>
                        <td><select name="faculty">
                                <option value="Faculty of Business">Faculty of Business</option>
                                <option value="Faculty of Technology">Faculty of Technology</option>
                                <option value="Faculty of Healthcare">Faculty of Healthcare</option>
                                <option value="Faculty of Arts">Faculty of Arts</option>
                                <option value="Faculty of Humanities">Faculty of Humanities</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td class="field_name">Degree</td>
                        <td> <input type="radio" name="degree" value="Bachelor's Degree" required="required" /> Bachelor's degree </td>
                  </tr>
                  <tr>
                        <td></td>
                        <td> <input type="radio" name="degree" value="Master's Degree" required="required" /> Master's degree </td>
                  </tr>
                  <tr>
                    <td></td>
                    <td> <input type="radio" name="degree" value="Doctorate" required="required" /> Doctorate </td>
                    </tr>

                 <tr>
                        <td class="field_name" >Language skills </td>
                        <td></td>
                  </tr>
                    <?php
                    // Fetch languages
                    $query = "SELECT LANGUAGE FROM LANGUAGES";
                    $result = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_array($result))
                    {
                        $listlanguage = $row['LANGUAGE'];
                    ?>
                        <tr>
                            <td></td>
                            <td> <input type="checkbox" name="language[]" value="<?php echo $listlanguage; ?>" /> <?php echo $listlanguage; ?> </td>
                        </tr>
                    <?php
                    }
                    ?>

                    <tr>
                        <td class="field_name" >Working experience </td>
                        <td>
                          <div class="short_input">
                             Years:<input type="number" name="years" min="0" required="required" value="<?php echo htmlspecialchars($yearsDb); ?>" />
                             Months:<input type="number" name="months" min="0" max="11" required="required" value="<?php echo htmlspecialchars($monthsDb); ?>" />
                  </div>
                            </td>
                    </tr>
<!--        skill            -->
                    <tr>
                        <td>Skills: </td>
                      <td></td>
                  </tr>
                  <tr>
                    <td></td>
                        <td> <textarea name="skills" cols="50" rows="10" maxlength="300" required="required" id="skills" placeholder="Separate skills by comma eg: C#, PHP, Agile"><?php
                                $query = "SELECT SKILL FROM STUDENT_SKILL WHERE REF_STU = '".$_SESSION['stu_id']."'";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_array($result)){
                                    echo trim($row['SKILL']).", ";
                                }
                                ?></textarea> </td>
                    </tr>
<!--        skill            -->
                    <tr>
                        <td>Other info: </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td> <textarea name="profiletext" cols="50" rows="10" maxlength="300" required="required"><?php echo htmlspecialchars($profiletextDb); ?></textarea> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td> <button type="submit" value="Submit" id="btnSubmit">Submit</button>
                            <button type="reset" value="Reset">Cancel</button> </td>
                    </tr>
                </table>
            </form>
        </div>

        <div class="contentbox" id="accountbox">
            <h2>Change password</h2>
            <form id="passwordform" method="post" action="profileedit.php">
                <table class="profileinfo">
                    <tr>
                        <td>Current password </td>	<td><input type="password" name="currentpasswd" required="required" /></td>
                    </tr>
                    <tr>
                        <td>New password </td>	<td><input type="password" name="newpasswd" required="required" /></td>
                    </tr>
                    <tr>
                        <td>Repeat new password </td>	<td><input type="password" name="newpasswdrepeat" required="required" /></td>
                    </tr>
                    <tr>
                        <td></td> <td><button type="submit" value="Submit">Submit</button> <button type="reset" value="Reset">Cancel</button></td>
                    </tr>
                </table>
            </form>

            <h2>Change email address</h2>
            <form id="emailform" method="post" action="profileedit.php">
                <table class="profileinfo">
                    <tr>
                        <td>Current email address </td>
                        <td><input type="email" name="currentemail" required="required" /></td>
                    </tr>
                    <tr>
                        <td>New email address </td>
                        <td><input type="email" name="newemail" required="required" /></td>
                    </tr>
                    <tr>
                        <td>Current password </td>
                        <td><input type="password" name="passwd" required="required" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button type="submit" value="Submit">Submit</button> <button type="reset" value="Reset">Cancel</button></td>
                    </tr>
                </table>
            </form>
            <button id="profiledelete" onClick="profileDelete()">Delete Profile</button>
        </div>
        <div class="contentbox" id="deletebox">
            <h2>Are you sure you want to delete your profile?</h2>
            <form id="deleteform" method="post" action="profileedit.php">
                <table class="profileinfo">
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="passwdDel" required="required" /></td>
                    </tr>
                    <td></td>
                    <td><button type="submit" value="Delete">Delete Profile</button></td>
                </table>
            </form>
        </div>
        <?php
        }
        ?>
    </div>
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


<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.0.js"></script>
<script src="js/app.js" type="text/javascript" charset="utf-8"></script>

<script src="js/index.js"></script>
<script src="js/profile.js"></script>
<script>
    $(document).on('click','#btnSubmit', function addSkills () {
          var  skills= $('#skills').val().split(',')

        $.ajax({
                url: "skills.php"
                , type: "post"
                , dateType: "text"
                , data: {
                    skills: skills
                }
                , success: function (result) {

                }
            }
        )
    });
</script>

</body>

</html>
