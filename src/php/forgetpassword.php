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



?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VoyageVista - Connexion</title>
    <link rel="stylesheet" href="../css/connexion.css">
</head>
<body>
    <main class="auth-page">
        <section class="intro-panel" aria-label="Bienvenue sur VoyageVista">
            <a class="brand" href="index.html" aria-label="VoyageVista">
                <span class="brand-icon">✈</span>
                <span>VoyageVista</span>
            </a>
            <div class="intro-copy">
                <p class="eyebrow">Explorez le monde</p>
                <h1>Bonjour !</h1>
                <p>Connectez-vous ou créez votre compte pour retrouver vos voyages, vos destinations favorites et vos prochaines réservations.</p>
            </div>
        </section>

        <section class="auth-shell" aria-label="Connexion et inscription">
            <input class="mode-input" type="radio" name="auth-mode" id="mode-login" checked>
            <input class="mode-input" type="radio" name="auth-mode" id="mode-signup">

            <div class="mode-switch" role="tablist" aria-label="Choisir le formulaire">
                <label for="mode-login">Connexion</label>
                <label for="mode-signup">Inscription</label>
            </div>

            <form class="auth-card login-card" action="forgetpassword.php" method="post">
                <div class="card-heading">
                    <p class="eyebrow">Bienvenue</p>
                    <h2>Connexion</h2>
                </div>

                <label for="login-email">E-mail</label>
                <input id="login-email" name="email" type="email" placeholder="votre@email.com" required>

                <button type="submit" name="forgetPasswordBtn">Récupérer mon mot de passe</button>
                <?php
                    if(isset($_POST["forgetPasswordBtn"])) 
                        {
                            $email = $_POST['email'];

                             $sql = "SELECT Password FROM Utilisateur WHERE Email = '$email'";
                             $result = mysqli_query($conn, $sql);

                             if (mysqli_num_rows($result) > 0) 
                                {
                                 echo"<br><p>Votre mot de passe actuel est : <h2>" . htmlspecialchars(mysqli_fetch_assoc($result)['Password']) . "</h2></p>";
                                 echo"<br><p>Cliquez ci-dessous pour vous connecter avec votre mot de passe récupéré</p>";
                                echo '<a href="../../connexion.html"><button type="button">Connexion</button></a>';                             
                                } else {
                                 echo "<h2>Erreur</h2>";
                                 echo "<p>Aucun utilisateur trouvé avec cette adresse e-mail.</p>";
                             }
                        }
                ?>
                
                <p class="switch-copy">Une fois votre mot de passe récupéré, vous pourrez vous connecter avec votre nouvel identifiant.</p>
            </form>
        </section>
    </main>
    <footer class="site-footer" id="about">
        <small>
            <div class="layout">VoyageVista - Hortense GALTIER, Valentine SAUVAIRE--MASSONNAT, Ewen ALBALADEJO</div>
        </small>
    </footer>
</body>
</html>