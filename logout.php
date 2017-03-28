<?php

session_start();
// destroy all session


session_destroy();

// redirect to index.php
echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert(\"Good bye! ".$_SESSION['username']."\")
        window.location.href='index.php';
        </SCRIPT>");
