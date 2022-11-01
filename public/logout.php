<?php
session_start();

$uploadFile = $_SESSION['avatar'] ?? "";

var_dump($uploadFile);


if(file_exists($uploadFile)){
    unlink($uploadFile);
}

session_unset();

header('Location: /');