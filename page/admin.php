<?php
session_start();
require_once '../include/database.php';
require_once '../action/delete.php';

// on recupere tous les utilisateurs
$utilisateur = $pdo->query("SELECT * FROM utilisateur ORDER BY idutilisateur DESC");
$commentaire = $pdo->query("SELECT * FROM commentaire ORDER BY utilisateur_idutilisateur DESC");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body>
    <div align="center">
        <br /><br />
        <h2>Gestion des utilisateurs</h2>
        <br /> <br />
        <table style="width: 100%;">
            <thead>
                <tr align="center">
                    <th scope="col" style="width: 20%;">ID</th>
                    <th scope="col" style="width: 20%;">Nom</th>
                    <th scope="col" style="width: 20%;">mail</th>
                    <th scope="col" style="width: 20%;">role</th>
                    <th scope="col" style="width: 20%;">action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($user = $utilisateur->fetch()) { ?>

                    <tr align="center">
                        <td><?= $user->idutilisateur ?></td>
                        <td><?= $user->nom ?></td>
                        <td><?= $user->email ?></td>
                        <td><?= $user->role ?></td>
                        <td><a href="editionProfil.php?idutilisateur=<?= $user->idutilisateur ?>"><button>Editer</button><br />
                                <a href="admin.php?supprime=<?= $user->idutilisateur ?>"><button>Supprimer</button></a> </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <br /> <br />
        <table style="width: 100%;">
            <thead>
                <tr align="center">
                    <th scope="col" style="width: 20%;">ID</th>
                    <th scope="col" style="width: 20%;">Nom</th>
                    <th scope="col" style="width: 40%;">Commentaire</th>
                    <th scope="col" style="width: 20%;">action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($com = $commentaire->fetch()) { ?>

                    <tr align="center">
                        <td><?= $user->idutilisateur ?></td>
                        <td><?= $user->nom ?></td>
                        <td><?= $user->commentaire ?></td>
                        <td><a href="admin.php?type=commentaire&approuve=<?= $com->idutilisateur ?>"><button>Approuvé</button><br />
                                <a href="admin.php?type=commentaire&supprime=<?= $com->idutilisateur ?>"><button>Supprimer</button></a> </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
</body>

</html>