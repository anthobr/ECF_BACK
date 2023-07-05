<?php
session_start();

require_once '../include/database.php';
require_once '../action/login.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connexion</title>
</head>

<body>
    <div align="center">
        <h2>Connexion</h2>
        <br /><br /><br />
        <form method="post">
            <input type="email" name="emailconnect" placeholder="Mail" />
            <input type="password" name="mpconnect" placeholder="Mot de passe" />
            <input type="submit" name="formconnection" value="Se connecter !" />
        </form>
        <br /><br />
        <?php
        if (isset($erreur)) {
            echo '<font color="red">' . $erreur . "</font>";
        }
        ?>
    </div>
</body>

</html>