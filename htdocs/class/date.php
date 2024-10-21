<?php

class date
{
    public PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getDate($idMaster)
    {
        $sql = "SELECT id, date, time FROM date WHERE id_master = :idMaster";
        $result = $this->pdo->prepare($sql);
        $result->execute([":idMaster" => $idMaster]);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addDate($date, $time, $id_master){
        $sql = "INSERT INTO `date` (`id`, `date`, `time`, `busy`, `id_master`) VALUES (NULL, :date, :time, 0, :id_master)";
        $result = $this->pdo->prepare($sql);
        $result->execute([
            ":date" => $date,
            ":time" => $time,
            ":id_master" => $id_master
        ]);
        header('Location: ../updateDate.php?master_id='.$id_master);
        exit();
    }

    public function deleteDate($idDate, $id_master)
    {
        $sql = "DELETE FROM `date` WHERE `id` = '$idDate'";
        $result = $this->pdo->prepare($sql);
        $result->execute();
        header('Location: ../updateDate.php?master_id='.$id_master);
    }

}
