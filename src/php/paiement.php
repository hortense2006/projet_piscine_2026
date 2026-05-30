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

if(isset($_POST["pay"])) 
    {

    echo "<h2>Paiement réussi !</h2>";
    echo "<p>Votre commande a été traitée avec succès.</p>";
    $name = "SELECT Prenom, Nom FROM utilisateur WHERE Email = '".$_SESSION['email']."'";

    $result = mysqli_query($conn, $name);
    $row = mysqli_fetch_assoc($result);
    echo"<p>Merci beaucoup d'avoir choisi VoyageVista : " . htmlspecialchars($row['Prenom']) . " " . htmlspecialchars($row['Nom']) . " !</p>";

    echo "<h2>Coût total : " . htmlspecialchars($_POST['total_price']) . " €</h2>";   

    $userid = "SELECT Id_utilisateur FROM utilisateur WHERE Email = '".$_SESSION['email']."'";
    $result = mysqli_query($conn, $userid);
    $row = mysqli_fetch_assoc($result);
    $sql = "INSERT INTO sejour (Statut, Prix_total,Id_utilisateur) VALUES ('Payé', '" . mysqli_real_escape_string($conn, $_POST['total_price']) . "', " . $row['Id_utilisateur'] . ")";
    if (mysqli_query($conn, $sql)) {
        echo "<h2>Enregistrement du séjour réussi !</h2>";
    } else {
        echo "<p>Erreur lors de l'enregistrement du séjour : " . mysqli_error($conn) . "</p>";
    }
};
    
?>
