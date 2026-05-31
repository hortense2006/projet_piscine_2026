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

if (isset($_POST["pay"])) {
    $totalPrice = mysqli_real_escape_string($conn, $_POST["total_price"] ?? "0");

    if (isset($_SESSION["email"])) {
        $userid = "SELECT Id_utilisateur FROM utilisateur WHERE Email = '" . mysqli_real_escape_string($conn, $_SESSION["email"]) . "'";
        $result = mysqli_query($conn, $userid);
        $row = mysqli_fetch_assoc($result);

        if ($row && isset($row["Id_utilisateur"])) {
            $sql = "INSERT INTO sejour (Statut, Prix_total, Id_utilisateur) VALUES ('Payé', '" . $totalPrice . "', " . $row["Id_utilisateur"] . ")";
            mysqli_query($conn, $sql);
        }
    }

    header("Location: ../../confirmation_paiement.html?total=" . urlencode($totalPrice));
    exit();
}

header("Location: ../../paiement.html");
exit();
?>
