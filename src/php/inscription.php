<?php
    function afficherPageInscription($titre, $message, $redirection = false) {
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
        echo "<p class='eyebrow'>Nouveau départ</p>";
        echo "<h1>Bienvenue !</h1>";
        echo "<p>Votre compte VoyageVista vous permet de préparer vos destinations, vos séjours et vos réservations.</p>";
        echo "</div>";
        echo "</section>";
        echo "<section class='auth-shell result-shell' aria-label='Résultat de l'inscription'>";
        echo "<div class='auth-card signup-card result-card'>";
        echo "<div class='card-heading'>";
        echo "<p class='eyebrow'>VoyageVista</p>";
        echo "<h2>" . htmlspecialchars($titre) . "</h2>";
        echo "</div>";
        echo "<p class='result-message'>" . $message . "</p>";
        if ($redirection) {
            echo "<a class='forgot-link' href='../../dashboard.html'>Accéder au dashboard</a>";
        } else {
            echo "<a class='forgot-link' href='../../connexion.html'>Retour à l'inscription</a>";
        }
        echo "</div>";
        echo "</section>";
        echo "</main>";
        echo "</body>";
        echo "</html>";
    }

    $servername = "localhost";
    $username = "root";
    $password = "root"; // A modifier en fonction de la base de donnée
    $dbname = "VoyageVista";
    $conn = mysqli_connect($servername, $username, $password, $dbname); 

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if(isset($_POST["inscriptionBtn"])) {
        $name = $_POST['name'];
        $prenom= $_POST['surname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $tel= $_POST['phone'];


        $checkmail = "SELECT * FROM Utilisateur WHERE Email = '$email'"; // Vérifier si l'email existe déjà
        $result = mysqli_query($conn, $checkmail);
        if (mysqli_num_rows($result) > 0) 
            {
            afficherPageInscription("Inscription impossible", "Cet email est déjà utilisé.");
        } else {
            $sql = "INSERT INTO Utilisateur (Nom, Prenom, Email, Password, Role) VALUES ('$name', '$prenom', '$email', '$password', 'user')";
            if (mysqli_query($conn, $sql)) {
                afficherPageInscription("Inscription réussie !", "Votre compte a bien été créé.", true);
            } else {
                afficherPageInscription("Erreur d'inscription", "Erreur lors de l'inscription : " . htmlspecialchars(mysqli_error($conn)));
            }
        }
    } else {
        afficherPageInscription("Inscription", "Veuillez utiliser le formulaire d'inscription.");
    }
?>
