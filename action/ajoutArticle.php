<?php

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
