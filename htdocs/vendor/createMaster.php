<?php
require_once "../class/masters.php";
require_once '../connect.php';
$masterName = $_POST['masterName'];
$masterSpecialization = $_POST['masterSpecialization'];

/** @var  $pdo */
$master = new Masters($pdo);
$master->createMasters($masterName, $masterSpecialization);
