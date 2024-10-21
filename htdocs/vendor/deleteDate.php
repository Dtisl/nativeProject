<?php
require_once '../class/date.php';
require_once '../connect.php';

$idDate = $_GET['date_id'];
$masterId = $_GET['master_id'];
/** @var  $pdo */
$date = new Date($pdo);
$result = $date->deleteDate($idDate,$masterId);

