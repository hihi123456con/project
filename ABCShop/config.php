<?php
    $databaseHost ="localhost";
    $databaseName ="shoppee";
    $databaseUsername ="root";
    $databasePassword ="";
    try{
        $conn = new PDO("mysql:host={$databaseHost}; dbname={$databaseName}",
        $databaseUsername, $databasePassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $ex) {
        echo $ex->getMessage("Connect failed!!");
    }

?>