<?php
require_once 'connect.php';
require_once 'class/date.php'
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style.css">
    <title>Выбор даты и времени</title>
</head>
<body>

<table>
    <tr>
        <th>Дата</th>
        <th>Время</th>
    </tr>
    <?php
    $master_id = $_GET['master_id'];
    /** @var $pdo */
    $dates = new date($pdo);
    $datesRes = $dates->getDate($master_id);
    foreach ($datesRes as $date) {
        ?>
        <tr>
            <td><?= $date['date'] ?></td>
            <td><?= $date['time'] ?></td>
            <td>
                <a href="vendor/recording-db.php?master_id=<?=$master_id?>&date_id=<?=$date['id']?>">
                    Записаться
                </a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
</body>
</html>
