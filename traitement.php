<?php


if
(
    empty($_POST['image']) || !filter_var($_POST['image'], FILTER_VALIDATE_URL) ||
    empty($_POST['description']) || strlen($_POST['description']) < 3 ||
    empty($_POST['artiste']) ||
    empty($_POST['titre'])
) {
    header('Location: index.php');

} else {
    include_once ('mysql.php');

    $image = htmlspecialchars($_POST['image']);
    $description = htmlspecialchars($_POST['description']);
    $artiste = htmlspecialchars($_POST['artiste']);
    $titre = htmlspecialchars($_POST['titre']);

    $requete = 'INSERT INTO oeuvres (titre,artiste,description,urlImage) VALUES (? ,? ,? ,?)';

    $state = $mysqlClient->prepare($requete);
    $state->execute([$titre,$artiste,$description,$image]);

    $lastInsert = $mysqlClient->lastInsertId();

    header('Location: oeuvre.php?id='.$mysqlClient->lastInsertId());

}
