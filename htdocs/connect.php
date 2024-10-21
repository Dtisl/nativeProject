<?php

$host = "127.0.0.1";
$userName = "root";
$password = "";
$dbName = "record";

$pdo = new PDO("mysql:host=$host;dbname=$dbName", $userName, $password);
