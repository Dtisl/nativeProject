<?php

class masters
{
    public PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getMasters()
    {
        $sql = "SELECT * FROM masters";
        $result = $this->pdo->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createMasters($masterName, $masterSpecialization){
        $sql = "INSERT INTO `masters` (`id`, `name`, `spec`) VALUES (NULL, '$masterName', '$masterSpecialization')";
        $result = $this->pdo->prepare($sql);
        $result->execute();
        header("location: ../admin.php");
        exit();
    }
}
