<?php

    ini_set('display_errors', 1);

    ini_set('display_startup_errors', 1);

    error_reporting(E_ALL);

    $mysqli = new mysqli("db", "root", "root", "nas");

    $stmt = $mysqli->prepare("SELECT * FROM `user` WHERE `username` = ?");

    $stmt->bind_param("s", $_POST["username"]);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($data = $result->fetch_assoc()) {

        if (password_verify($_POST["password"], $data["password_hash"])) {

            session_start();

            $_SESSION['id'] = $data['id'];

            $_SESSION['api_key'] = $data['api_key'];

            $_SESSION['Logged'] = true;

            $_SESSION['Folder'] = 0;

            $_SESSION["Path"] = array(-1);

            header("refresh:0.1; url=../../../index.php");

            exit();

        } else {

            header("refresh:2; url=../../../login.php");

            echo "Error: Incorrect Identifiers, You Will Be Redirected To The Login Page";

            exit();

        }

    } else {

        header("refresh:2; url=../../../login.php");

        echo "Error: Incorrect Identifiers, You Will Be Redirected To The Login Page";

        exit();

    }

    ?>