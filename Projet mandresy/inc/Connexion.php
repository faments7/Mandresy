<?php
    $user='postgres';
    $pass='postgres';
    $dsn='pgsql:host=localhost;port=5432;dbname=mandresy';
    try {
        $dbh= new PDO($dsn,$user,$pass);
    }catch (PDOException $e) {
        print "Erreur ! :". $e->getMessage();
        die();
    }
?>