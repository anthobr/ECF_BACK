<?php

require_once '../include/database.php';
session_start();

if (isset($_GET['idutilisateur']) and $_GET['idutilisateur'] > 0) {
    $getidutilisateur = intval($_GET['idutilisateur']);
    $requser = $pdo->prepare('SELECT * FROM utilisateur WHERE idutilisateur = ?');
    $requser->execute(array($getidutilisateur));
    $utilisateur = $requser->fetch();
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <title>tuto php</title>
    </head>

    <body>
        <div align="center">
            <br /><br />
            <h2>Profil de <?php echo $utilisateur->nom; ?></h2>
            <br /><br />
            Mail = <?php echo $utilisateur->email; ?>
            <br /> <br />
            <?php
            if (isset($_SESSION['idutilisateur']) and $utilisateur->idutilisateur == $_SESSION['idutilisateur']) {
            ?>
                <a href="editionProfil.php?idutilisateur=<?= $_SESSION['idutilisateur'] ?>"><button>Editer mon profil</button></a>
            <?php
            }
            ?>
            <br /><br />
            <a href="../action/logout.php"><button>Se déconnecter</button></a>

        </div>
    </body>

    </html>
<?php
}
?>