<?php


require_once '../include/database.php';
session_start();


if (isset($_SESSION['idutilisateur'])) {
    $requser = $pdo->prepare("SELECT * FROM utilisateur WHERE idutilisateur = ?");
    $requser->execute(array($_SESSION['idutilisateur']));
    $utilisateur = $requser->fetch();

    // Modification du nom
    if (isset($_POST['newnom']) and !empty($_POST['newnom']) and $_POST['newnom'] != $utilisateur->nom) {
        $newnom = htmlspecialchars($_POST['newnom']);
        $insertnom = $pdo->prepare("UPDATE utilisateur SET nom = ? WHERE idutilisateur = ?");
        $insertnom->execute(array($newnom, $_SESSION['idutilisateur']));
        header('Location: profil.php?idutilisateur=' . $_SESSION['idutilisateur']);
    }
    // Modification de l'email
    if (isset($_POST['newemail']) and !empty($_POST['newemail']) and $_POST['newemaim'] != $utilisateur->email) {
        $newemail = htmlspecialchars($_POST['newemail']);
        $insertemail = $pdo->prepare("UPDATE utilisateur SET email = ? WHERE idutilisateur = ?");
        $insertemail->execute(array($newemail, $_SESSION['idutilisateur']));
        header('Location: profil.php?idutilisateur=' . $_SESSION['idutilisateur']);
    }

    if (isset($_POST['newnom']) and $_POST['newnom'] == $utilisateur->nom) {
        header('Location: profil.php?idutilisateur=' . $_SESSION['idutilisateur']);
    }

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>tuto php</title>
    </head>

    <body>
        <div align="center">
            <br /><br />
            <h2>Edition de mon profil</h2>

            <form method="POST">
                <label>Nom:</label>
                <br />
                <input type="text" name="newnom" placeholder="nom" value="<?= $utilisateur->newnom ?>" />
                <br /><br />
                <label>Email:</label>
                <br />
                <input type="email" name="newemail" placeholder="email" value="<?= $utilisateur->email ?>" />
                <br /><br />
                <input type="submit" value="Mettre a jour mon profil !" />
                <br /><br />
            </form>
        </div>
    </body>

    </html>
<?php
} else {
    header("Location: ../page/index.php");
}
?>