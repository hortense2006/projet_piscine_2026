<?php
    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "VoyageVista";
    $conn = mysqli_connect($servername, $username, $password, $dbname); 

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (!isset($_SESSION["Id_utilisateur"])) {
        header("Location: ../../connexion.html");
        exit();
    }

    $idUtilisateur = $_SESSION["Id_utilisateur"];

    $userSql = "SELECT Id_utilisateur, Nom, Prenom, Email, Role FROM Utilisateur WHERE Id_utilisateur = ?";
    $userStmt = mysqli_prepare($conn, $userSql);
    mysqli_stmt_bind_param($userStmt, "i", $idUtilisateur);
    mysqli_stmt_execute($userStmt);
    $userResult = mysqli_stmt_get_result($userStmt);
    $user = mysqli_fetch_assoc($userResult);

    if (!$user) {
        session_destroy();
        header("Location: ../../connexion.html");
        exit();
    }

    $_SESSION["Nom"] = $user["Nom"];
    $_SESSION["Prenom"] = $user["Prenom"];
    $_SESSION["Email"] = $user["Email"];
    $_SESSION["Role"] = $user["Role"];
    $_SESSION["email"] = $user["Email"];

    $sejourSql = "SELECT ID_sejour, Date_creation, Statut, Prix_total FROM Sejour WHERE Id_utilisateur = ? ORDER BY Date_creation DESC, ID_sejour DESC";
    $sejourStmt = mysqli_prepare($conn, $sejourSql);
    mysqli_stmt_bind_param($sejourStmt, "i", $idUtilisateur);
    mysqli_stmt_execute($sejourStmt);
    $sejourResult = mysqli_stmt_get_result($sejourStmt);
    $sejours = [];

    while ($sejour = mysqli_fetch_assoc($sejourResult)) {
        $sejours[] = $sejour;
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VoyageVista - Profil</title>
    <link rel="stylesheet" href="../css/profil.css">
</head>
<body id="top">
    <header class="site-header">
        <div class="layout navbar">
            <a class="brand" href="../../dashboard.html" aria-label="VoyageVista">
                <span class="brand-icon">✈</span>
                <span>VoyageVista</span>
            </a>

            <nav class="main-nav" aria-label="Navigation principale">
                <a href="../../dashboard.html">Accueil</a>
                <a href="../../dashboard.html#destinations">Destinations</a>
                <a href="#voyages">Mes voyages</a>
                <a href="../../about.html">À propos</a>
                <a class="active" href="#top">Profil</a>
                <a class="logout-link" href="../../index.html">Déconnexion</a>
            </nav>
        </div>
    </header>

    <main>
        <section class="profile-hero">
            <div class="layout hero-content">
                <p class="eyebrow">Mon espace voyage</p>
                <h1>Votre profil VoyageVista</h1>
                <p>Consultez vos informations, vos envies de voyage et vos sélections favorites depuis une seule page.</p>
            </div>
        </section>

        <section class="layout personal-panel" aria-labelledby="personal-title">
            <div class="panel-header">
                <div>
                    <p class="eyebrow">Profil</p>
                    <h2 id="personal-title">Mes informations personnelles</h2>
                </div>
                <a href="#top">Modifier</a>
            </div>

            <div class="info-grid">
                <article class="info-card">
                    <span class="info-icon">ID</span>
                    <h3>Identité</h3>
                    <p><?php echo "Nom : " . htmlspecialchars($user["Prenom"] . " " . $user["Nom"]); ?></p>
                    <p><?php echo "Email : " . htmlspecialchars($user["Email"]); ?></p>
                    <p><?php echo "Rôle : " . htmlspecialchars($user["Role"]); ?></p>
                </article>

                <article class="info-card">
                    <span class="info-icon">⌂</span>
                    <h3>Adresse</h3>
                    <p>Rue</p>
                    <p>Ville</p>
                    <p>Pays</p>
                </article>

                <article class="info-card">
                    <span class="info-icon">★</span>
                    <h3>Activités favorites</h3>
                    <p>Plage</p>
                    <p>Culture</p>
                    <p>Randonnée</p>
                </article>

                <article class="info-card">
                    <span class="info-icon">✦</span>
                    <h3>Préférences de voyage</h3>
                    <p>Budget moyen</p>
                    <p>Départs flexibles</p>
                    <p>Séjours au soleil</p>
                </article>
            </div>
        </section>

        <section class="layout trips-panel" id="voyages" aria-label="Aperçu des voyages">
            <input class="tab-input" type="radio" name="trip-tabs" id="tab-flights" checked>
            <input class="tab-input" type="radio" name="trip-tabs" id="tab-hotels">
            <input class="tab-input" type="radio" name="trip-tabs" id="tab-activities">
            <input class="tab-input" type="radio" name="trip-tabs" id="tab-packages">

            <div class="tabs" role="tablist" aria-label="Catégories de voyages">
                <label for="tab-flights">Vols</label>
                <label for="tab-hotels">Hôtels</label>
                <label for="tab-activities">Activités</label>
                <label for="tab-packages">Formules</label>
            </div>

            <div class="tab-content flights-content">
                <div>
                    <p class="eyebrow">Historique</p>
                    <h2>Mes voyages réservés</h2>
                    <?php if (count($sejours) === 0): ?>
                        <p>Aucun voyage réservé pour le moment.</p>
                    <?php else: ?>
                        <?php foreach ($sejours as $sejour): ?>
                            <p>
                                <?php
                                    echo "Séjour #" . htmlspecialchars($sejour["ID_sejour"]) .
                                        " - " . htmlspecialchars($sejour["Statut"]) .
                                        " - " . htmlspecialchars(number_format((float)$sejour["Prix_total"], 2, ",", " ")) . " €" .
                                        " - réservé le " . htmlspecialchars($sejour["Date_creation"]);
                                ?>
                            </p>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <img src="../../images/image_bali.avif" alt="Bali, Indonésie">
            </div>

            <div class="tab-content hotels-content">
                <div>
                    <p class="eyebrow">Aperçu dynamique</p>
                    <h2>Hôtels favoris</h2>
                    <p>Vous avez sauvegardé des hôtels proches de la plage, avec piscine et petit-déjeuner inclus.</p>
                </div>
                <img src="../../images/image_maldives.avif" alt="Hôtel aux Maldives">
            </div>

            <div class="tab-content activities-content">
                <div>
                    <p class="eyebrow">Aperçu dynamique</p>
                    <h2>Activités préférées</h2>
                    <p>Vos sélections mettent en avant les visites culturelles, les sorties nautiques et les panoramas naturels.</p>
                </div>
                <img src="../../images/image_santorin.avif" alt="Activités à Santorin">
            </div>

            <div class="tab-content packages-content">
                <div>
                    <p class="eyebrow">Aperçu dynamique</p>
                    <h2>Formules recommandées</h2>
                    <p>VoyageVista peut combiner vol, hôtel et activités pour préparer un séjour complet en quelques clics.</p>
                </div>
                <img src="images/image_dubai.avif" alt="Package voyage à Dubaï">
            </div>
        </section>
    </main>

    <footer class="site-footer" id="about">
        <small>
            <div class="layout">VoyageVista - Hortense GALTIER, Valentine SAUVAIRE--MASSONNAT, Ewen ALBALADEJO</div>
        </small>
    </footer>
</body>
</html>
