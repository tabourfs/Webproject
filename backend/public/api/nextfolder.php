<?php
session_start();
if(isset($_GET["folder_id"])){
    $_SESSION["Path"][] =$_SESSION["Folder"];
    $_SESSION["Folder"] = $_GET["folder_id"];

}

header("refresh:0.1; url=../../../index.php");
exit();