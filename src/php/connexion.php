<?php
session_start();

function afficherPageConnexion($titre, $message, $redirection = false) {
    echo "<!DOCTYPE html>";
    echo "<html lang='fr'>";
    echo "<head>";
    echo "<meta charset='UTF-8'>";
    echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo "<title>VoyageVista - " . htmlspecialchars($titre) . "</title>";
    echo "<link rel='stylesheet' href='../css/connexion.css'>";
    if ($redirection) {
        echo "<script>localStorage.setItem('statutConnexion', 'connecte'); window.location.href = '../../dashboard.html';</script>";
    }
    echo "</head>";
    echo "<body>";
    echo "<main class='auth-page'>";
    echo "<section class='intro-panel' aria-label='Bienvenue sur VoyageVista'>";
    echo "<a class='brand' href='../../index.html' aria-label='VoyageVista'>";
    echo "<span class='brand-icon'>✈</span>";
    echo "<span>VoyageVista</span>";
    echo "</a>";
    echo "<div class='intro-copy'>";
    echo "<p class='eyebrow'>Explorez le monde</p>";
    echo "<h1>Bonjour !</h1>";
    echo "<p>Votre espace VoyageVista vous permet de préparer vos destinations, vos séjours et vos réservations.</p>";
    echo "</div>";
    echo "</section>";
    echo "<section class='auth-shell result-shell' aria-label='Résultat de connexion'>";
    echo "<div class='auth-card login-card result-card'>";
    echo "<div class='card-heading'>";
    echo "<p class='eyebrow'>VoyageVista</p>";
    echo "<h2>" . htmlspecialchars($titre) . "</h2>";
    echo "</div>";
    echo "<p class='result-message'>" . $message . "</p>";
    if ($redirection) {
        echo "<a class='forgot-link' href='../../dashboard.html'>Accéder au dashboard</a>";
    } else {
        echo "<a class='forgot-link' href='../../connexion.html'>Retour à la connexion</a>";
    }
    echo "</div>";
    echo "</section>";
    echo "</main>";
    echo "</body>";
    echo "</html>";
}

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "VoyageVista";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["loginBtn"])) {
    $email = trim($_POST["email"] ?? "");
    $motDePasse = $_POST["password"] ?? "";

    $sql = "SELECT Id_utilisateur, Nom, Prenom, Email, Password, Role FROM Utilisateur WHERE Email = ? AND Password = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $email, $motDePasse);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        $_SESSION["Id_utilisateur"] = $user["Id_utilisateur"];
        $_SESSION["Nom"] = $user["Nom"];
        $_SESSION["Prenom"] = $user["Prenom"];
        $_SESSION["Email"] = $user["Email"];
        $_SESSION["Role"] = $user["Role"];
        $_SESSION["email"] = $user["Email"];

        afficherPageConnexion("Connexion réussie !", "Bienvenue, " . htmlspecialchars($user["Prenom"] . " " . $user["Nom"]) . " !", true);
    } else {
        afficherPageConnexion("Échec de la connexion", "Email ou mot de passe incorrect.");
    }
} else {
    afficherPageConnexion("Connexion", "Veuillez utiliser le formulaire de connexion.");
}
?>
