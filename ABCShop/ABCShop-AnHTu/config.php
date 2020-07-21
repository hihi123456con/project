<?php
    $database_host = "localhost";
    $database_name = "Shoppee";
    $database_username = "root";
    $database_password = "";
    try {
        $conn = new PDO("mysql:host={$database_host}; dbname={$database_name}", $database_username, $database_password);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
?>