<?php

require_once '../include/database.php';
require_once '../action/register.php';

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
        <h2>Inscription</h2>
        <br /><br /><br />
        <form method="POST" action="">
            <table>
                <tr>
                    <td align="right">
                        <label for="nom">Nom :</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Votre Nom" id="nom" name="nom" value="<?php if (isset($nom)) {
                                                                                                    echo $nom;
                                                                                                } ?>" />
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <label for="email">Mail :</label>
                    </td>
                    <td>
                        <input type="email" placeholder="Votre mail" id="email" name="email" value="<?php if (isset($email)) {
                                                                                                        echo $email;
                                                                                                    } ?>" />
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <label for="email2">Confirmation Mail :</label>
                    </td>
                    <td>
                        <input type="email" placeholder="Confirmer votre mail" id="email2" name="email2" value="<?php if (isset($email2)) {
                                                                                                                    echo $email2;
                                                                                                                } ?>" />
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <label for="mp">Mot de passe:</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Mot de passe" id="mp" name="mp" />
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <label for="mp2">Confirmer votre mot de passe:</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Confirmer votre mot de passe" id="mp2" name="mp2" />
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td align="center">
                        <br />
                        <input type="submit" name="forminscription" value="je m'inscris" />
                    </td>
                </tr>
            </table>
        </form>
        <?php
        if (isset($erreur)) {
            echo '<font color="red">' . $erreur . "</font>";
        }
        ?>
    </div>

</body>

</html>