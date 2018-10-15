<?php

    $host='localhost';
    $username = 'root';
    $pass = '';

    try{
        $dbcon = new PDO("mysql:localhost=$host;dbname=articledb",$username,$pass);
        $dbcon->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>