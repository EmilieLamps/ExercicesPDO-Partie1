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
$query = 'SELECT * FROM `shows`' ;
$usersQueryStat = $db->query($query);
$usersList = $usersQueryStat->fetchAll(PDO::FETCH_ASSOC);

foreach ($usersList as $user):
  ?>
  <p>Titre : <?= $user['title']  ?> Par : <?=  $user['performer'] ?></p>
  <p>Le <?= $user['date']  ?> à : <?=  $user['startTime'] ?></p>
<?php
endforeach;