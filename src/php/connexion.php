<?php
    function afficherPageConnexion($titre, $message, $redirection = false) {
        echo "<!DOCTYPE html>";
        echo "<html lang='fr'>";
        echo "<head>";
        echo "<meta charset='UTF-8'>";
        echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        echo "<title>VoyageVista - " . htmlspecialchars($titre) . "</title>";
        echo "<link rel='stylesheet' href='../css/connexion.css'>";
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

    if(isset($_POST["loginBtn"])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM Utilisateur WHERE Email = '$email' AND Password = '$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            afficherPageConnexion("Connexion réussie !", "Bienvenue, " . htmlspecialchars($email) . " !", true);
        } else {
            afficherPageConnexion("Échec de la connexion", "Email ou mot de passe incorrect.");
        }
    } else {
        afficherPageConnexion("Connexion", "Veuillez utiliser le formulaire de connexion.");
    }
?>
