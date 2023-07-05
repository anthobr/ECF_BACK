<?php
if (isset($_POST['formconnection'])) {


    if (!empty($_POST['emailconnect'])) {
        $emailconnect = htmlspecialchars($_POST['emailconnect']);
        $query = "SELECT * FROM utilisateur WHERE email = ? ";
        $statement = $pdo->prepare($query);
        $statement->execute([$emailconnect]);
        $user = $statement->fetch();

        if ($user) {
            if (password_verify($_POST['mpconnect'], $user->mp)) {

                $_SESSION['idutilisateur'] = $user->idutilisateur;
                $_SESSION['nom'] = $user->nom;
                $_SESSION['email'] = $user->email;
                header("Location: profil.php?idutilisateur=" . $_SESSION['idutilisateur']);
            } else {
                $erreur = "Mauvais mail ou mauvais mot de passe";
            }
        }
    } else {
        $erreur = "Votre mail n'existe pas";
    }
}
