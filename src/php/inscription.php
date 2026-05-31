<?php
    session_start();

    function afficherPageInscription($titre, $message, $redirection = false) {
        echo "<!DOCTYPE html>";
        echo "<html lang='fr'>";
        echo "<head>";
        echo "<meta charset='UTF-8'>";
        echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        echo "<title>VoyageVista - " . htmlspecialchars($titre) . "</title>";
        echo "<link rel='stylesheet' href='../css/connexion.css'>";
        if ($redirection) {
            echo "<script>localStorage.setItem('statutConnexion', 'connecte');</script>";
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


        $checkmail = "SELECT Id_utilisateur FROM Utilisateur WHERE Email = ?";
        $checkStmt = mysqli_prepare($conn, $checkmail);
        mysqli_stmt_bind_param($checkStmt, "s", $email);
        mysqli_stmt_execute($checkStmt);
        $result = mysqli_stmt_get_result($checkStmt);
        if (mysqli_num_rows($result) > 0) 
            {
            afficherPageInscription("Inscription impossible", "Cet email est déjà utilisé.");
        } else {
            $role = "Client";
            $sql = "INSERT INTO Utilisateur (Nom, Prenom, Email, Password, Role) VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sssss", $name, $prenom, $email, $password, $role);
            if (mysqli_stmt_execute($stmt)) {
                $_SESSION["Id_utilisateur"] = mysqli_insert_id($conn);
                $_SESSION["Nom"] = $name;
                $_SESSION["Prenom"] = $prenom;
                $_SESSION["Email"] = $email;
                $_SESSION["Role"] = $role;
                $_SESSION["email"] = $email;
                header("Location: ../../inscription.html");
                exit();
            } else {
                afficherPageInscription("Erreur d'inscription", "Erreur lors de l'inscription : " . htmlspecialchars(mysqli_error($conn)));
            }
        }
    } else {
        afficherPageInscription("Inscription", "Veuillez utiliser le formulaire d'inscription.");
    }
?>
