<?php
class Rituel {
  private $conn;
  private $table = 'rituels';

  public $id;
  public $nom;
  public $etat;
  public $date_rituel;

  public function __construct($db) {
    $this->conn = $db;
  }

  public function create() {
    $query = "INSERT INTO $this->table (nom, etat, date_rituel) VALUES (:nom, :etat, NOW())";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':nom', $this->nom);
    $stmt->bindParam(':etat', $this->etat);
    return $stmt->execute();
  }

  public function readAll() {
    $query = "SELECT * FROM $this->table ORDER BY date_rituel DESC";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
  }

  public function count() {
    $query = "SELECT COUNT(*) as total FROM $this->table";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
  }
}
