<?php
session_start();
require_once("app/util.php");
require_once("app/db.php");

if (isGet()) {
    if (isLogin()) {
        $sql = "SELECT id, name, email, phone, password FROM users WHERE id = :id";
        $result = DB::getRow($sql, [':id' => $_SESSION['id']]);
        $userName = $result["name"];
        $phoneNumber = $result["phone"];
        $email = $result["email"];
        $password = $result["password"];
        include_once("templates/profile.tpl.php");
    } else {
        header('Location: http://' . $_SERVER["HTTP_HOST"] . '/');
    }
}
if (isPost()){
    $name = $_POST["userName"];
    $phone = $_POST["phoneNumber"];
    $email = $_POST["email"];
    $pass = $_POST["password"];
    // тут бы тоже валидацию сделать
    $sql = "UPDATE users SET name=:name, email=:email, phone=:phone, password=:pass WHERE id = :id";
    $result = DB::getRow($sql, [':name' => $name, ':pass' => $pass, ':phone' => $phone, ':email' => $email, ':id' => $_SESSION['id']]);
    header('Location: http://' . $_SERVER["HTTP_HOST"] . '/profile.php');
}