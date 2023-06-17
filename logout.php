<?php
require_once('app/util.php');
session_start();
logout();
header('Location: http://' . $_SERVER["HTTP_HOST"] . '/');