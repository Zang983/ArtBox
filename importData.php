<?php
function createData($mysqlClient)
{
    require 'oeuvres.php';
    $requete = $mysqlClient->prepare('INSERT INTO oeuvres (titre,description,artiste,urlImage) VALUES (?,?,?,?)');

    foreach ($oeuvres as $oeuvre) {
        $requete->execute([$oeuvre['titre'], $oeuvre['description'], $oeuvre['artiste'], $oeuvre['image']]);
    }
    $getOeuvres = $mysqlClient->prepare('SELECT * FROM oeuvres');
    $getOeuvres->execute();
    $oeuvres = $getOeuvres->fetchAll();
    return $oeuvres;
}



