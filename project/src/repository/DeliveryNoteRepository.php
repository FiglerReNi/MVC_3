<?php


class DeliveryNoteRepository
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getDeliveryNotes()
    {
        $query = "";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_BOTH);
        return $result;
    }

    public function getDeliveryNoteItems($deliveryNote)
    {
        $query = "";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue();
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_BOTH);
        return $result;
    }
}