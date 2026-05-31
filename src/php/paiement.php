<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "VoyageVista";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Erreur connexion");
}

if (!isset($_SESSION["Id_utilisateur"])) {
    header("Location: ../../connexion.html");
    exit();
}

if (!isset($_POST["pay"])) {
    header("Location: ../../paiement.html");
    exit();
}

$idUtilisateur = (int) $_SESSION["Id_utilisateur"];
$totalPrice = (float) ($_POST["total_price"] ?? 0);
$orderItems = json_decode($_POST["order_items"] ?? "[]", true);

if (!is_array($orderItems)) {
    $orderItems = [];
}

$_SESSION["dernier_panier"] = $orderItems;

$statut = "Confirmé";
$sql = "INSERT INTO Sejour (Date_creation, Statut, Prix_total, Id_utilisateur) VALUES (NOW(), ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sdi", $statut, $totalPrice, $idUtilisateur);
mysqli_stmt_execute($stmt);

header("Location: profil.php#voyages");
exit();
?>
