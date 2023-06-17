<?php
session_start();
require_once("app/db.php");
require_once("app/util.php");
require_once("app/registerForm.php");

if (isset($_SESSION["errors"])){
    $errors = $_SESSION["errors"];
    unset($_SESSION["errors"]);
}
if (isGet()){
    extract($_SESSION["form"]);
    include_once("templates/register.tpl.php");
}

if (isPost()){
    $_SESSION["form"]["userName"] = $_POST["userName"];
    $_SESSION["form"]["phone"] = $_POST["phoneNumber"];
    $_SESSION["form"]["email"] = $_POST["email"];
    $form = new RegisterForm();
    $form->loadData($_POST);

    if ($form->validate()){
        $existsError = checkExistUser($form);
        if ($existsError){
            registerNewUser($form->userName, $form->phoneNumber, $form->email, $form->password);
            header('Location: http://' . $_SERVER["HTTP_HOST"] . '/login.php');
        }
        else {
            $_SESSION["errors"] = $existsError;
            header('Location: http://' . $_SERVER["HTTP_HOST"] . '/register.php');  
        }
    } else {        
        $_SESSION["errors"] = $form->errors;
        header('Location: http://' . $_SERVER["HTTP_HOST"] . '/register.php');
    }    
}