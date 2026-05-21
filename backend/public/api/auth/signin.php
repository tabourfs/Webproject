<?php

    ini_set('display_errors', 1);

    ini_set('display_startup_errors', 1);

    error_reporting(E_ALL);

    session_start();

    $Password_hashed = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $username = $_POST['username'];
    $api_key = $_POST['api_key'];



    if (isset($_SESSION['Logged'])) {

        echo "Error, You Are Not Allowed To Be There";

    }

    if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["confirm_password"]) && isset($_POST["api_key"])) {

        $mysqli = new mysqli("db", "root", "root", "nas");

        $stmt = $mysqli->prepare("INSERT INTO user (`id`, `username`, `password_hash`, `api_key`) VALUES(NULL, ?, ?, ?)");

        $stmt->bind_param("sss", $username, $Password_hashed, $api_key);

        $stmt->execute();

        $result = $stmt->get_result();

    } else {

        header("refresh:2; url=../../../signin.php");

        echo "Error: Missing Fields, You Will Be Redirected To The Sign In Page ";

        exit();

    }

    if ($result == FALSE) {

        header("refresh:2; url=../../../main.html");

        echo "Creating Accound, You Will Be Redirected To The Main Page...";

        exit();

    } else {

        header("refresh:2; url=../../../signin.php");

        echo "Error, Couldn't Create The Account";

        exit();

    }
