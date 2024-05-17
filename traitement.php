<?php

$image = htmlspecialchars(trim($_POST['image']));
$description = htmlspecialchars(trim($_POST['description']));
$artiste = htmlspecialchars(trim($_POST['artiste']));
$titre = htmlspecialchars(trim($_POST['titre']));

if
(
    empty($image) || !filter_var($image, FILTER_VALIDATE_URL) ||
    empty($description) || strlen($description) < 3 ||
    empty($artiste) ||
    empty($titre)
) {
    header('Location: index.php');

} else {
    include_once ('mysql.php');



    $requete = 'INSERT INTO oeuvres (titre,artiste,description,urlImage) VALUES (? ,? ,? ,?)';

    $state = $mysqlClient->prepare($requete);
    $state->execute([$titre,$artiste,$description,$image]);

    $lastInsert = $mysqlClient->lastInsertId();

    header('Location: oeuvre.php?id='.$mysqlClient->lastInsertId());

}
