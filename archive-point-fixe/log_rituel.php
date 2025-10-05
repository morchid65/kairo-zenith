<?php
$nom = $_POST['nom'] ?? 'Nada Nada';
$etat = $_POST['etat'] ?? 'activé';

try {
  $pdo = new PDO('mysql:host=localhost;dbname=kairo_zenith', 'root', '');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $pdo->prepare("INSERT INTO rituels (nom, date_rituel, etat) VALUES (?, NOW(), ?)");
  $stmt->execute([$nom, $etat]);

  echo "Rituel enregistré.";
} catch (PDOException $e) {
  echo "Erreur : " . $e->getMessage();
}
?>
