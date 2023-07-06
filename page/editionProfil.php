<?php


require_once '../include/database.php';
require_once '../action/edit.php';
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tuto php</title>
</head>

<body>
    <div align="center">
        <br /><br />
        <h2>Edition de mon profil</h2>

        <form method="POST">
            <label>Nom:</label>
            <br />
            <input type="text" name="newnom" placeholder="nom" value="<?= $utilisateur->nom ?>" />
            <br /><br />
            <label>Email:</label>
            <br />
            <input type="email" name="newemail" placeholder="email" value="<?= $utilisateur->email ?>" />
            <br /><br />
            <input type="submit" value="Mettre a jour mon profil !" />
            <br /><br />
        </form>
    </div>
</body>

</html>