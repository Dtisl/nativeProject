<?php
session_start();
require_once 'connect.php'
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style.css">
    <title>Регистрация</title>
</head>
<body>
<form action="vendor/registrationHandle.php" method="post" enctype="multipart/form-data">
    <label>ФИО</label>
    <input type="text" placeholder="Фамилия Имя Отчество" name="fullName" required>
    <label>Логин</label>
    <input type="text" placeholder="Введите логин" name="login" required>
    <label>Пароль</label>
    <input type="password" placeholder="Введите пароль" name="password" required>
    <label>Повторите пароль</label>
    <input type="password" placeholder="Введите пароль повторно" name="repeatPassword" required>
    <label>Адрес электронной почты</label>
    <input type="email" placeholder="Введите email" name="email" required>
    <button type="submit">Зарегистрироваться</button>
    <p>
        <a href="index.php">Есть аккаунт? - авторизируйтесь!</a>
    </p>
    <?php
    if (isset($_SESSION['message'])) {
        echo '<p class="msg">' . $_SESSION['message'] . '</p>';
    }
    unset($_SESSION['message']);
    ?>
</form>
</body>
</html>
