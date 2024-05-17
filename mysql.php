<?php
include_once ("config.php");
try{
    $mysqlClient = new PDO("mysql:host=localhost;dbname=projet4",$mysql_user, $mysql_password);
}
catch (PDOException $e){
    die("Erreur : " . $e->getMessage());
}
