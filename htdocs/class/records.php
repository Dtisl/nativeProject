<?php

class records
{
    public PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getUserRecordsById($idUser)
    {
        $sql = "SELECT * FROM records WHERE id_client = :id";
        $result = $this->pdo->prepare($sql);
        $result->execute([
            ':id' => $idUser
        ]);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserRecordsFromMasters($prompt)
    {
        $sql = "SELECT * FROM masters WHERE id = :prompt";
        $result = $this->pdo->prepare($sql);
        $result->execute([
            ':prompt' => $prompt
        ]);
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserRecordsFromDate($prompt)
    {
        $sql = "SELECT * FROM date WHERE id = :prompt";
        $result = $this->pdo->prepare($sql);
        $result->execute([
            ':prompt' => $prompt
        ]);
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function record($id_master, $id_client, $id_date){
        $sql = "INSERT INTO `records` (`id`, `id_master`, `id_client`, `id_date`) VALUES (NULL, :id_master, :id_client, :id_date)";
        $result = $this->pdo->prepare($sql);
        $result->execute([
            ':id_master' => $id_master,
            ':id_client' => $id_client,
            ':id_date' => $id_date,
        ]);

    }
    public function updateBusy($id_date){
        $sql = "UPDATE `date` SET `busy` = '1' WHERE `date`.`id` = :id_date";
        $result = $this->pdo->prepare($sql);
        $result->execute([
            ':id_date' => $id_date
        ]);
    }
}
