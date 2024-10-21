<?php
require_once '../class/date.php';
require_once '../connect.php';
$date = $_POST["date"];
$time = $_POST["time"];
$idMaster = $_GET["master_id"];
/** @var  $pdo */
$dateObj = new Date($pdo);
$createDate = $dateObj->addDate($date, $time, $idMaster);

