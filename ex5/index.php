<?php
function connectDb(){
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
$query = "SELECT * FROM `clients` WHERE `lastName` LIKE 'M%' ORDER BY `lastName` ASC " ;
$usersQueryStat = $db->query($query);
$usersList = $usersQueryStat->fetchAll(PDO::FETCH_ASSOC);

foreach ($usersList as $user):
  ?>
  <p>Nom : <?= $user['firstName']  ?></p>
  <p>Prénom : <?=  $user['lastName'] ?></p>
<?php
endforeach;