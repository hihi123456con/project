<?php
    define('DB_SERVER','');
    define('DB_NAME', 'phonedb');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    try {
        $conn = new PDO ("mysql:host=".DB_SERVER.";dbname=".DB_NAME,DB_USERNAME,DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $ex) {
        die('ERROR: Connect failed!!!'.$ex->getMessage());
    }
?>