<?php
require_once 'connect.php';
require_once 'class/masters.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Список мастеров</title>
</head>
<body>

<table>
    <tr>
        <th>Мастер</th>
        <th>Специализация</th>
        <th>Действие</th>
    </tr>
    <?php
    /** @var $pdo */
    $masters = new masters($pdo);
    $mastersRes = $masters->getMasters();
    foreach ($mastersRes as $master) {
        ?>
        <tr>
            <td><?= $master['name'] ?></td>
            <td><?= $master['spec'] ?></td>
            <td><a href="choiseDate.php?master_id=<?=$master['id']?>" class="button">Хочу
                    его/её!</a></td>
        </tr>
        <?php
    }
    ?>
</table>

</body>
</html>
