<?php
require_once 'connect.php';
require_once 'class/date.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style.css">
    <title>Админка</title>
</head>
<style>
    body {
        flex-direction: column;
    }
</style>
<body>
<h1>Записи</h1>
<table>
    <tr>
        <th>Дата</th>
        <th>Время</th>
    </tr>
    <?php
    $idMaster = $_GET['master_id'];
    /** @var $pdo */
    $dates = new Date($pdo);
    $getDate = $dates->getDate($idMaster);
    foreach ($getDate as $date) {
        ?>
        <tr>
            <td><?= $date['date'] ?></td>
            <td><?= $date['time'] ?></td>
            <td>
                <a href="vendor/deleteDate.php?date_id=<?= $date['id'] ?>&master_id=<?= $idMaster ?>">
                    Отменить запись
                </a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
<br>
<form action="vendor/createDate.php?master_id=<?= $idMaster ?>" method="post">
    <label>Выберите дату</label>
    <input type="date" name="date">
    <label>Выберите время</label>
    <input type="time" name="time">
    <button type="submit">Добавить</button>
</form>
<a href="admin.php">Назад</a>
</body>
</html>
