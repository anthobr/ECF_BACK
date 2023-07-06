<?php
require_once '../include/database.php';
require_once '../action/ajoutCom.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commentaire / Edition</title>
</head>

<body>
    <div align="center">
        <h1>Articles</h1>
        <form method="POST">
            <input type="text" name="nom" placeholder="Titre" <?php if ($mode_edition == 1) { ?> value="<?= $edit_article->nom ?>" <?php } ?> />
            <br /> <br />
            <textarea placeholder="Description de l'article" name="description"><?php if ($mode_edition == 1) { ?><?= $edit_article->description ?> <?php } ?></textarea>
            <br /> <br />
            <input type="submit" value="Envoyer l'article" />

        </form>
        <br />
        <?php if (isset($message)) {
            echo '<font color="red">' . $message . "</font>";
        } ?>
        <br /> <br />
        <a href="article.php?idarticle=<?= $edit_id ?>"><button>Retour à l'acceuil</button></a>
    </div>

</body>

</html>