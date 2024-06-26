<?php
require 'header.php';
require 'mysql.php';
require 'importData.php';

$getOeuvres = $mysqlClient->prepare('SELECT * FROM oeuvres');
$getOeuvres->execute();
$oeuvres = $getOeuvres->fetchAll();
if (!$oeuvres) {
    $oeuvres = createData($mysqlClient);
}
?>
<div id="liste-oeuvres">
    <?php foreach ($oeuvres as $oeuvre):
        ?>
        <article class="oeuvre">
            <a href="oeuvre.php?id=<?= $oeuvre['id'] ?>">
                <img src="<?= $oeuvre['urlImage'] ?>" alt="<?= $oeuvre['titre'] ?>">
                <h2><?= $oeuvre['titre'] ?></h2>
                <p class="description"><?= $oeuvre['artiste'] ?></p>
            </a>
        </article>
    <?php endforeach; ?>
</div>
<?php require 'footer.php'; ?>