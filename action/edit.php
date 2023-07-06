<?php

$id = $_GET['idutilisateur'];


if (isset($_SESSION['idutilisateur']) && $_SESSION['role'] == 1) {
    $requser = $pdo->prepare("SELECT * FROM utilisateur WHERE idutilisateur = ?");
    $requser->execute(array($id));
    $utilisateur = $requser->fetch(PDO::FETCH_OBJ);

    // Modification du nom
    if (isset($_POST['newnom']) and !empty($_POST['newnom']) and $_POST['newnom'] != $utilisateur->nom) {
        $newnom = $_POST['newnom'];
        $insertnom = $pdo->prepare("UPDATE utilisateur SET nom = ? WHERE idutilisateur = ?");
        $insertnom->execute(array($newnom, $id));
        header('Location: admin.php');
    }
    // Modification de l'email
    if (isset($_POST['newemail']) and !empty($_POST['newemail']) and $_POST['newemaim'] != $utilisateur->email) {
        $newemail = htmlspecialchars($_POST['newemail']);
        $insertemail = $pdo->prepare("UPDATE utilisateur SET email = ? WHERE idutilisateur = ?");
        $insertemail->execute(array($newemail, $_SESSION['idutilisateur']));
        header('Location: admin.php');
    }

    if (isset($_POST['newnom']) and $_POST['newnom'] == $utilisateur->nom) {
        header('Location: admin.php');
    }
} else {
    $requser = $pdo->prepare("SELECT * FROM utilisateur WHERE idutilisateur = ?");
    $requser->execute(array($id));
    $utilisateur = $requser->fetch();

    // Modification du nom
    if (isset($_POST['newnom']) and !empty($_POST['newnom']) and $_POST['newnom'] != $utilisateur->nom) {
        $newnom = $_POST['newnom'];
        $insertnom = $pdo->prepare("UPDATE utilisateur SET nom = ? WHERE idutilisateur = ?");
        $insertnom->execute(array($newnom, $_SESSION['idutilisateur']));
        header('Location: profil.php?idutilisateur=' . $_SESSION['idutilisateur']);
    }
    // Modification de l'email
    if (isset($_POST['newemail']) and !empty($_POST['newemail']) and $_POST['newemail'] != $utilisateur->email) {
        $newemail = htmlspecialchars($_POST['newemail']);
        $insertemail = $pdo->prepare("UPDATE utilisateur SET email = ? WHERE idutilisateur = ?");
        $insertemail->execute(array($newemail, $_SESSION['idutilisateur']));
        header('Location: profil.php?idutilisateur=' . $_SESSION['idutilisateur']);
    }

    if (isset($_POST['newnom']) and $_POST['newnom'] == $utilisateur->nom) {
        header('Location: profil.php?idutilisateur=' . $_SESSION['idutilisateur']);
    }
}
