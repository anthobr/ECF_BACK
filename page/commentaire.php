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
    <form method="POST">
        <input type="text" name="nom" placeholder="Titre" value="<?= $edit_article->nom ?>" />
        <br /> <br />
        <textarea placeholder="Description de l'article" name="description"><?= $edit_article->description ?></textarea>
        <br /> <br />
        <input type="submit" value="Envoyer l'article" />

    </form>
    <br />
    <?php if (isset($message)) {
        echo '<font color="red">' . $message . "</font>";
    } ?>
</body>

</html>