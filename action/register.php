<?php

if (isset($_POST['forminscription'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $email2 = htmlspecialchars($_POST['email2']);
    $mp = $_POST['mp'];
    $mp2 = $_POST['mp2'];

    if (!empty($_POST['nom']) and !empty($_POST['email']) and !empty($_POST['email2']) and !empty($_POST['mp']) and !empty($_POST['mp2'])) {

        $nomlength = strlen($nom);
        if ($nomlength <= 100) {
            $reqnom = $pdo->prepare("SELECT * FROM utilisateur WHERE nom = ?");
            $reqnom->execute(array($nom));
            $nomexist = $reqnom->rowCount();
            if ($nomexist == 0) {
                if ($email == $email2) {
                    $reqemail = $pdo->prepare("SELECT * FROM utilisateur WHERE email = ?");
                    $reqemail->execute(array($email));
                    $emailexist = $reqemail->rowCount();
                    if ($emailexist == 0) {
                        if ($mp = $mp2) {
                            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                $mph = password_hash($mp, PASSWORD_DEFAULT);
                                $insertmbr = $pdo->prepare("INSERT INTO utilisateur (nom, email, mp, role) VALUE (?,?,?,?)");
                                $insertmbr->execute(array($nom, $email, $mph, 0));
                                $_SESSION['flash']['success'] = "Votre compte a bien été créé !";
                                header('Location: ../page/connexion.php');
                                exit();
                            } else {
                                $erreur = "Votre adresse mail n'est pas valide !";
                            }
                        } else {
                            $erreur = "Les mots de passe ne correspondent pas";
                        }
                    } else {
                        $erreur = "Adresse mail déjà utilisée !";
                    }
                } else {
                    $erreur = "Vos adresse mail ne correspondent pas !";
                }
            } else {
                $erreur = "Ce nom est déjà utilisée !";
            }
        } else {
            $erreur = "Votre pseudo ne doit pas dépassé 100 charactères!";
        }
    } else {
        $erreur = "Tous les champs doivent être complétés !";
    }
}
