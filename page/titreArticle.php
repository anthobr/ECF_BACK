<?php
require_once '../include/database.php';

$article = $pdo->query('SELECT * FROM article ORDER BY idarticle DESC');

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article acceuil</title>
</head>

<body>
    <ul>
        <?php while ($a = $article->fetch()) { ?>
            <li><a href="article.php?idarticle=<?= $a->idarticle ?>"><?= $a->nom ?></a> | <a href="commentaire.php?edit=<?= $a->idarticle ?>">Modifier</a> - <a href="">Supprimer</a> </li><br />
        <?php  } ?>
    </ul>
</body>

</html>