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
		
		
		<script>
		
			function deleteAd() {
				
			window.location = "deleteAd.php?id=" + <?php echo $_GET['expand']; ?> 
		};
			
		</script>
		

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
        <div class="nav2 twobtn">
            <?php

                $sessionname = $_SESSION['username'];
                $ad_id = $_GET['expand']; // ID of the ad this page is about
                $namecorrect = false; // Checks whether the names match
                // Checks whether the user on this page is the owner of this ad
                $query2 = "SELECT * FROM COMPANY WHERE ID_COMP = (SELECT REF_COMP FROM ADVERTISEMENT WHERE ID_ADV = $ad_id)";
                $result2 = mysqli_query($conn, $query2);
                while ($row2 = mysqli_fetch_array($result2))
                {
                    $dbname = $row2['COMP_USERNAME'];
                    if ($sessionname == $dbname)
                    {
                        $namecorrect = true;
                    }
                }
                //Only admin and the employer who made this ad can edit/delete it
                if ((isset($_SESSION['admin'])) || (isset($_SESSION['employer']) && $namecorrect == true)){ ?>
                <div>
                    <ul>
                        <form action="editAd.php" method="post">
                            <input type="hidden" id="ad_id" name="ad_id" value="<?php echo htmlspecialchars($ad_id); ?>">
                            <li><button type="submit" value="Submit">Edit</button></li>
                        </form>
                        <li><button onclick="deleteAd()" class="delete" >Delete</button></li>
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

        echo '<div class=\"jobad\">';

        echo    '<h1>'.$value.'</h1>';
        echo '<p>Location: '.$row['LOCATION'].' </p>';
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
    <script src="js/singlead.js"></script>
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
