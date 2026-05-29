<?php
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
            echo "<h2>Connexion réussie !</h2>";
            echo "<p>Bienvenue, " . htmlspecialchars($email) . "!</p>";
            echo "<script>setTimeout(function() { window.location.href = '../../dashboard.html'; }, 1500);</script>";
        } else {
            echo "<h2>Échec de la connexion</h2>";
            echo "<p>Email ou mot de passe incorrect.</p>";
        }
        
    }
    echo "<p>Vous pouvez fermer cet onglet</p>"
?>
