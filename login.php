<?php

session_start();
require_once("app/util.php");
require_once("app/db.php");

if (isset($_SESSION["error"])) {
    $error = true;
    unset($_SESSION["error"]);
}
if (isGet()) {
    include_once("templates/login.tpl.php");
}

if (isPost()) {
    $uName = $_POST["emailOrPhoneNumber"];
    $uPass = $_POST["password"];
    if (login($uName, $uPass)) {
        header('Location: http://' . $_SERVER["HTTP_HOST"] . '/profile.php');
    } else {
        $_SESSION["error"] = true;
        header('Location: http://' . $_SERVER["HTTP_HOST"] . '/login.php');
    }
}
