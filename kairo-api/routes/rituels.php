<?php
include_once '../config/database.php';
include_once '../models/Rituel.php';

$db = (new Database())->connect();
$rituel = new Rituel($db);

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

if ($method === 'POST') {
  $data = json_decode(file_get_contents("php://input"));
  $rituel->nom = $data->nom ?? 'Nada Nada';
  $rituel->etat = $data->etat ?? 'activé';
  echo json_encode(['success' => $rituel->create()]);
}

if ($method === 'GET' && strpos($uri, 'count') !== false) {
  $total = $rituel->count();
  echo json_encode(['total_rituels' => $total]);
}

if ($method === 'GET' && strpos($uri, 'count') === false) {
  $stmt = $rituel->readAll();
  $rituels = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($rituels);
}
