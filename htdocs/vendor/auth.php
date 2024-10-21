<?php
session_start();
require_once '../class/user.php';
require_once '../connect.php';
$login = $_POST['login'];
$password = md5($_POST['password']);
/** @var $pdo */
$user_auth = new user($pdo);
$user_auth->logIn($login, $password);
