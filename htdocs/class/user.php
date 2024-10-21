<?php

class user
{
    public PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function logIn($login, $password)
    {
        $sql = "SELECT * FROM users WHERE login = :login AND password = :password";
        $result = $this->pdo->prepare($sql);
        $result->execute([
            'login' => $login,
            'password' => $password
        ]);
        $result = $result->fetch(PDO::FETCH_ASSOC);
        $_SESSION['user'] = [
            'id' => $result['id'],
            'full_name' => $result['full_name'],
            'email' => $result['email'],
            'admin' => $result['admin'],
        ];
        if ($result['admin'] == 1) {
            header('location: ../admin.php');
            exit();
        } else {
            header('location: ../index.php');
            exit();
        }
    }

    public function registration($fullName, $login, $password, $email)
    {
        $sql = "INSERT INTO `users` (`id`, `full_name`, `login`, `email`, `password`, `avatar`, `admin`) VALUES (NULL, :fullName, :login, :email, :password, NULL, NULL)";
        $result = $this->pdo->prepare($sql);
        try {
            $result->execute([
                'fullName' => $fullName,
                'login' => $login,
                'email' => $email,
                'password' => $password,
            ]);
            header('location: ../index.php');
            exit();
        } catch (PDOException $exception) {
            $_SESSION['message'] = "Пользователь с такими логином или адресом электронной почты уже существует!";
            header('location: ../registration.php');
            exit();
        }

    }
}
