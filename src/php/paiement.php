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

$firstItem = $orderItems[0] ?? [];
$destinationName = $firstItem["destination"] ?? "Destination non renseignée";
$destinationParts = array_map("trim", explode(",", $destinationName, 2));
$destinationCity = $destinationParts[0] ?: "Destination non renseignée";
$destinationCountry = $destinationParts[1] ?? "Non renseigné";
$departureDate = $firstItem["depart"] ?? date("Y-m-d");
$returnDate = $firstItem["retour"] ?? $departureDate;
$travelersLabel = $firstItem["voyageurs"] ?? "1 adulte";
$travelersCount = (stripos($travelersLabel, "famille") !== false) ? 4 : ((int) $travelersLabel ?: 1);

function normalizeDateTime($dateValue) {
    if (!$dateValue) {
        return date("Y-m-d H:i:s");
    }

    return date("Y-m-d H:i:s", strtotime($dateValue . " 09:00:00"));
}

function getItemPriceByType($items, $type) {
    foreach ($items as $item) {
        if (($item["type"] ?? "") === $type) {
            return (float) ($item["price"] ?? 0);
        }
    }

    return 0;
}

$destinationSql = "INSERT INTO Destination (Nom_ville, Pays, Description, Id_utilisateur) VALUES (?, ?, ?, ?)";
$destinationStmt = mysqli_prepare($conn, $destinationSql);
$destinationDescription = "Destination réservée depuis VoyageVista.";
mysqli_stmt_bind_param($destinationStmt, "sssi", $destinationCity, $destinationCountry, $destinationDescription, $idUtilisateur);
mysqli_stmt_execute($destinationStmt);

foreach ($orderItems as $item) {
    $itemType = $item["type"] ?? "";
    $itemLabel = $item["label"] ?? "Élément réservé";
    $itemPrice = (float) ($item["price"] ?? 0);

    if ($itemType === "hôtel") {
        $hebergementSql = "INSERT INTO Hebergement (Nom, Type, Capacite_max, Prix_nuit, Id_utilisateur) VALUES (?, ?, ?, ?, ?)";
        $hebergementStmt = mysqli_prepare($conn, $hebergementSql);
        $hebergementType = "Hôtel";
        mysqli_stmt_bind_param($hebergementStmt, "ssidi", $itemLabel, $hebergementType, $travelersCount, $itemPrice, $idUtilisateur);
        mysqli_stmt_execute($hebergementStmt);
    }

    if ($itemType === "activité") {
        $activiteSql = "INSERT INTO Activite (Nom_activite, Description, Heure, Capacite_max, Prix, Id_utilisateur) VALUES (?, ?, ?, ?, ?, ?)";
        $activiteStmt = mysqli_prepare($conn, $activiteSql);
        $activiteDescription = "Activité réservée depuis VoyageVista.";
        $activityDate = normalizeDateTime($departureDate);
        mysqli_stmt_bind_param($activiteStmt, "sssidi", $itemLabel, $activiteDescription, $activityDate, $travelersCount, $itemPrice, $idUtilisateur);
        mysqli_stmt_execute($activiteStmt);
    }
}

$transportSql = "INSERT INTO Transport (Type_transport, Lieu_depart, Lieu_arrivee, Date_depart, Date_arrivee, Prix, Capacite, Id_utilisateur) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$transportStmt = mysqli_prepare($conn, $transportSql);
$transportType = $firstItem["transport"] ?? "Avion";
$departurePlace = "Paris";
$transportDeparture = normalizeDateTime($departureDate);
$transportReturn = normalizeDateTime($returnDate);
$transportPrice = 0;
mysqli_stmt_bind_param($transportStmt, "sssssdii", $transportType, $departurePlace, $destinationCity, $transportDeparture, $transportReturn, $transportPrice, $travelersCount, $idUtilisateur);
mysqli_stmt_execute($transportStmt);

$statut = "Confirmé";
$sql = "INSERT INTO Sejour (Date_creation, Statut, Prix_total, Id_utilisateur) VALUES (NOW(), ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sdi", $statut, $totalPrice, $idUtilisateur);
mysqli_stmt_execute($stmt);

header("Location: ../../confirmation_paiement.html");
exit();
?>
