<?php
$request = $_SERVER['REQUEST_URI'];

if (strpos($request, '/rituels') !== false) {
  include_once 'routes/rituels.php';
} else {
  echo json_encode(['message' => 'Bienvenue dans l’API Kairo Zenith']);
}
