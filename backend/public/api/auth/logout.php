<?php
session_start();
if(isset($_GET['logout-submit']) && $_GET['logout-submit'] == 'logout'){
  session_unset();
  session_destroy();
}

header("refresh:1; url=../../../index.php");

        echo "Logout In Progress";

        exit();