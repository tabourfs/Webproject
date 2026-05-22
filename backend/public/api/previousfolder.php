<?php
session_start();
$_SESSION["Folder"] = array_pop($_SESSION["Path"]);

header("refresh:0.1; url=../../../index.php");
exit();