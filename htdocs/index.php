<?php
session_start();
require_once 'class/session.php';
require_once 'class/records.php';
require_once 'connect.php'
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style.css">
    <title>Авторизация</title>
</head>
<body>
<?php
$session = new session();
if ($session->getUser() === null) {
    ?>

    <form action="vendor/auth.php" method="post">
        <label>Логин</label>
        <input type="text" placeholder="Введите логин" name="login">
        <label>Пароль</label>
        <input type="password" placeholder="Введите пароль" name="password">
        <button type="submit">Войти</button>
        <p>
            <a href="registration.php">Нет аккаунта? - зарегистрируйтесь!</a>
        </p>
        <?php
        if (isset($_SESSION['message'])) {
            echo '<p class="msg">' . $_SESSION['message'] . '</p>';
        }
        unset($_SESSION['message']);
        ?>
    </form>
    <?php
} else {
    ?>
    <div class="profile-container">
        <div class="profile-info">
            <h2><?= $session->getUserName() ?></h2>
            <a href="choiseMaster.php?">Записаться к мастеру</a>
            <a href="vendor/exit.php">Выход</a>
        </div>

        <div class="profile-records">
            <h3>Ваши записи</h3>
            <table>
                <tr>
                    <th>Мастер</th>
                    <th>Специализация</th>
                    <th>Дата</th>
                    <th>Время</th>
                </tr>

                <?php
                $idUser = $_SESSION['user']['id'];
                /** @var $pdo */
                $userRecords = new records($pdo);
                $record = $userRecords->getUserRecordsById($idUser);
                foreach ($record as $record) {
                    $masterInfo = $userRecords->getUserRecordsFromMasters($record['id_master']);
                    $dateInfo = $userRecords->getUserRecordsFromDate($record['id_date']);
                    ?>
                    <tr>
                        <td><?= $masterInfo['name'] ?></td>
                        <td><?= $masterInfo['spec'] ?></td>
                        <td><?= $dateInfo['date'] ?></td>
                        <td><?= $dateInfo['time'] ?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
    <?php
}
?>

</body>
</html>
