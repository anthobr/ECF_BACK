<?php
require_once '../include/database.php';

if (isset($_GET['idarticle']) and !empty($_GET['idarticle'])) {
    $mode_edition = 1;
    $suppr_id = htmlspecialchars($_GET['idarticle']);
    $suppr = $pdo->prepare('DELETE FROM article WHERE idarticle = ? ');
    $suppr->execute(array($suppr_id));
    header('Location: ../page/titreArticle.php');
}
