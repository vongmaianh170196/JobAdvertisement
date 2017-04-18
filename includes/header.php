<div id="nav">
    <!-----------
wrap-nav
------------->
    <div class="wrap-nav">
        <!--search-->
        <div class="search">
            <a class="linkbutton" href="index.php">Home page</a>
            <form id="jobsearch" method="get" action="search.php">
                <input type="text" name="job" placeholder="Job...">
                <input type="text" name="location" placeholder="Location...">
                <input type="submit" value="Find" />
            </form>
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
