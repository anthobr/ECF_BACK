<?php

$mode_edition = 0;



if (isset($_GET['edit']) and !empty($_GET['edit'])) {
    $mode_edition = 1;
    $edit_id = htmlspecialchars($_GET['edit']);
    $edit_article = $pdo->prepare('SELECT * FROM article WHERE idarticle = ?');
    $edit_article->execute(array($edit_id));

    if ($edit_article->rowCount() == 1) {
        $edit_article = $edit_article->fetch();
    } else {
        die('Erreur : l\'article concerné n\'existe pas...');
    }
}


if (isset($_POST['nom'], $_POST['description'])) {
    if (!empty($_POST['nom']) and !empty($_POST['description'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $description = htmlspecialchars($_POST['description']);

        if ($mode_edition == 0) {
            $insertcom = $pdo->prepare('INSERT INTO article (nom, description) VALUE (?,?)');
            $insertcom->execute(array($nom, $description));
            $message = 'Votre article a bien été ajouté';
        } else {
            $idarticle = $_GET['edit'];
            $update = $pdo->prepare('UPDATE article SET nom = ?, description = ? WHERE idarticle = ?');
            $update->execute(array($nom, $description, $idarticle));
            $message = 'Votre article a bien été mis à jour';
        }
    } else {
        $message = 'Veuillez remplir tous les champs';
    }
}
