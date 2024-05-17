<?php
require 'header.php';
require 'oeuvres.php';
require_once 'mysql.php';

// Si l'URL ne contient pas d'id, on redirige sur la page d'accueil
if (empty($_GET['id'])) {
    header('Location: index.php');
}

$requete = 'SELECT * FROM oeuvres WHERE id = :id';

$getOeuvre = $mysqlClient->prepare($requete);
$getOeuvre->execute([
    'id' => $_GET['id']
]);
$oeuvre = $getOeuvre->fetchAll()[0];


// Si aucune oeuvre trouvé, on redirige vers la page d'accueil
if (is_null($oeuvre)) {
    header('Location: index.php');
}
?>

<article id="detail-oeuvre">
    <div id="img-oeuvre">
        <img src="<?= $oeuvre['urlImage'] ?>" alt="<?= $oeuvre['titre'] ?>">
    </div>
    <div id="contenu-oeuvre">
        <h1><?= $oeuvre['titre'] ?></h1>
        <p class="description"><?= $oeuvre['artiste'] ?></p>
        <p class="description-complete">
            <?= $oeuvre['description'] ?>
        </p>
    </div>
</article>

<?php require 'footer.php'; ?>