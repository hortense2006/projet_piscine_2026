<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
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


        $checkmail = "SELECT * FROM utilisateur WHERE Email = '$email'"; // Vérifier si l'email existe déjà
        $result = mysqli_query($conn, $checkmail);
        if (mysqli_num_rows($result) > 0) 
            {
            echo "<h2>Cet email est déjà utilisée.</h2>";
        } else {
            $sql = "INSERT INTO utilisateur (Nom, Prenom, Email, Password, Role) VALUES ('$name', '$prenom', '$email', '$password', 'user')";
            if (mysqli_query($conn, $sql)) {
                echo "<h2>Inscription réussie !</h2>";
            } else {
                echo "<p>Erreur lors de l'inscription : " . mysqli_error($conn) . "</p>";
            }
        }
        echo "<p>Vous pouvez fermer cet onglet</p>";
    }
?>