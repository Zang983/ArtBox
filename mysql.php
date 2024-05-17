<?php
try{

    $mysqlClient = new PDO("mysql:host=localhost;dbname=projet4", $_ENV["mysqlUser"], $_ENV["mysqlPwd"]);
}
catch (PDOException $e){

    die("Erreur : " . $e->getMessage());
}
