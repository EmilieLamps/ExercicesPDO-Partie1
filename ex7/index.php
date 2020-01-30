<?php
$message = '';
$idCard =  '';

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
$query = 'SELECT * FROM `clients`';
$usersQueryStat = $db->query($query);
$usersList = $usersQueryStat->fetchAll(PDO::FETCH_ASSOC);


foreach ($usersList as $user):
    // Condition qui transforme le 0 et le 1 en oui ou non + affichage du numéro en cas de oui.
        if ($user['card'] == 1) {
        $message = 'Oui, numéro de carte : ' . $user['cardNumber'];
        ;
    } else {
        $message = 'Non';
    }
    ?>
    <p>Nom : <?= $user['lastName'] ?></p>
    <p>Prénom <?= $user['firstName'] ?></p>
    <p>Date de naissance <?= $user['birthDate'] ?></p>
    <p>Carte de fidélité <?= $message . $idCard  ?></p>
    <?php
endforeach;
