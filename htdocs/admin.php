<?php
session_start();
require_once 'connect.php';
require_once 'class/session.php';
require_once 'class/masters.php';
$session = new session();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style.css">
    <title>Админка</title>
</head>
<body>
<div class="profile-container">
    <div class="profile-info">
        <h2><?= $session->getUserName() ?></h2>
        <a href="vendor/exit.php">Выход</a>
    </div>
    <div class="profile-records">
        <h3>Мастера</h3>
        <table>
            <tr>
                <th>Мастер</th>
                <th>Действие</th>
            </tr>
            <?php
            /** @var $pdo */
            $masters = new Masters($pdo);
            $getMasters = $masters->getMasters();
            foreach ($getMasters as $master) {
                ?>
                <tr>
                    <td><?= $master['name'] ?></td>
                    <td><a href="updateDate.php?master_id=<?= $master['id'] ?>">Перейти</a></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <form action="vendor/createMaster.php" method="post">
            Добавить мастера
            <label>ФИО</label>
            <input type="text" name="masterName">
            <label>Специализация</label>
            <input type="text" name="masterSpecialization">
            <button type="submit">Добавить мастера</button>
        </form>
    </div>
</body>
</html>

