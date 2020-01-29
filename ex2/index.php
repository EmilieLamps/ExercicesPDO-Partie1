<?php

function connectDb() {
    require_once 'paramsp1.php';

    $dsn = 'mysql:dbname=' . DB . ';host=' . HOST;

    try {
        $db = new PDO($dsn, USER, PASSWD);
        return $db;
    } catch (Exception $ex) {
        die('La connexion à la base de données a échoué !');
    }
}
$db = connectDb();
$db->exec("SET CHARACTER SET utf8");
$query = 'SELECT * FROM `showTypes`';
$usersQueryStat = $db->query($query);
$usersList = $usersQueryStat->fetchAll(PDO::FETCH_ASSOC);

foreach ($usersList as $user):
    ?>
    <p><?= $user['type'] ?></p>
    <?php
endforeach;
