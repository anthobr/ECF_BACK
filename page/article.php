<?php
require_once '../include/database.php';

if (isset($_GET['idarticle']) and !empty($_GET['idarticle'])) {
    $get_idarticle = htmlspecialchars($_GET['idarticle']);

    $article = $pdo->prepare(('SELECT * FROM article WHERE idarticle = ?'));
    $article->execute(array($get_idarticle));

    if ($article->rowCount() == 1) {
        $article = $article->fetch();
        $nom = $article->nom;
        $description = $article->description;
    } else {
        die('Cet article n\'existe pas');
    }
} else {
    die('Erreur');
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article acceuil</title>
</head>

<body>
    <h1> <?= $nom ?> </h1>
    <p><?= $description ?></p>

</body>

</html>