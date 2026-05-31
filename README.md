# VoyageVista - Plateforme de planification de voyages 

Projet de développement Web Dynamique réalisé par Hortense GALTIER, Valentine SAUVAIRE-MASSONNAT et Ewen ALBALADEJO.

## Prérequis 
Ce projet n'utilise pas de framework externe complexe. Pour le faire fonctionner, vous avez uniquement besoin de :
- Un serveur web local avec PHP et MySQL (ex: **WAMP, XAMPP ou MAMP**).
- Un navigateur web moderne (Chrome, Firefox...).

## Instructions d'installation

**Étape 1 : Préparation des fichiers**
1. Téléchargez le code source ou clonez ce dépôt GitHub.
2. Placez l'intégralité du dossier `projet_piscine_2026` dans le répertoire web de votre serveur local :
   - Pour WAMP : `C:\wamp64\www\`
   - Pour XAMPP : `C:\xampp\htdocs\`

**Étape 2 : Configuration de la Base de Données**
1. Lancez votre serveur local (Apache et MySQL doivent être actifs).
2. Ouvrez **phpMyAdmin** (généralement via `http://localhost/phpmyadmin`).
3. Créez une nouvelle base de données nommée `VoyageVista`.
4. Importez le script SQL fourni : cliquez sur l'onglet "Importer", sélectionnez le fichier `VoyageVista.sql` situé à la racine du projet, et exécutez-le.

**Étape 3 : Lancement de l'application**
1. Ouvrez votre navigateur web.
2. Accédez à l'URL suivante : `http://localhost/projet_piscine_2026/index.html` (adaptez le nom du dossier selon comment vous l'avez nommé).

## Configuration de la connexion (Info pour les professeurs)
Si votre configuration MySQL utilise un mot de passe spécifique (autre que vide pour root), veuillez modifier les identifiants de connexion PDO présents au début de nos scripts dans le dossier `src/php/` (ex: `connexion.php`, `inscription.php`).
