<?php
if (isset($_GET['type']) and $_GET['type'] == 'utilisateur') {

    if (isset($_GET['supprime']) and !empty($_GET['supprime'])) {
        $supprime = (int) $_GET['supprime'];

        $req = $pdo->prepare('DELETE FROM utilisateur WHERE idutilisateur = ?');
        $req->execute(array($supprime));
    } elseif (isset($_GET['type']) and $_GET['type'] == 'commentaire') {
        if (isset($_GET['supprime']) and !empty($_GET['supprime'])) {
            $supprime = (int) $_GET['supprime'];

            $req = $pdo->prepare('DELETE FROM commentaire WHERE idutilisateur = ?');
            $req->execute(array($supprime));
        }
    } else {
        exit();
    }
}
