<?php
session_start();
require_once '../class/user.php';
require_once '../connect.php';
$fullName = $_POST["fullName"];
$login = $_POST["login"];
$password = md5($_POST["password"]);
$repeatPassword = md5($_POST["repeatPassword"]);
$email = $_POST["email"];


/** @var  $pdo */
$userRegistration = new User($pdo);
if ($password === $repeatPassword) {
    $user = $userRegistration->registration($fullName, $login, $password, $email);
    header("location: ../index.php");
    exit();
} else {
    $_SESSION['message'] = "Пароли не совпадают";
    header("location: ../registration.php");
    exit();
}

