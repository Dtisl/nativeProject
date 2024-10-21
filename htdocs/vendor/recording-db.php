<?php
session_start();
require_once '../connect.php';
require_once '../class/records.php';
$id_master = trim($_GET['master_id']);
$id_date = trim($_GET['date_id']);
$id_client = $_SESSION['user']['id'];
/** @var $pdo */
$record = new records($pdo);
$recordRes = $record->record($id_master, $id_date, $id_client);
$recordBusy = $record->updateBusy($id_date);
header("location: ../index.php");
exit();

