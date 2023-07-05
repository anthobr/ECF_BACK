<?php

if (isset($_GET['edit']) and !empty($_GET['edit'])) {
    $edit_id = htmlspecialchars($_GET['edit']);
    $edit_article = $pdo->prepare('SELECT * FROM article WHERE idarticle = ?');
    $edit_article->execute(array($edit_id));

    if ($edit_article->rowCount() == 1) {
        $edit_article = $edit_article->fetch();
    } else {
        die('Erreur : l\'article concerné n\'existe pas...');
    }
} else {
    if (isset($_POST['nom'], $_POST['description'])) {
        if (!empty($_POST['nom']) and !empty($_POST['description'])) {
            $nom = htmlspecialchars($_POST['nom']);
            $description = htmlspecialchars($_POST['description']);
            $insertcom = $pdo->prepare('INSERT INTO article (nom, description) VALUE (?,?)');
            $insertcom->execute(array($nom, $description));
            $message = 'Votre article a bien été ajouté';
        } else {
            $message = 'Veuillez remplir tous les champs';
        }
    }
}

if (isset($_POST['nom'], $_POST['description'])) {
    if (!empty($_POST['nom']) and !empty($_POST['description'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $description = htmlspecialchars($_POST['description']);
        $insertcom = $pdo->prepare('INSERT INTO article (nom, description) VALUE (?,?)');
        $insertcom->execute(array($nom, $description));
        $message = 'Votre article a bien été ajouté';
    } else {
        $message = 'Veuillez remplir tous les champs';
    }
}
