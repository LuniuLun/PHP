<?php
    define('server', 'localhost');
    define('user', 'root');
    define('password', '');
    define('database', 'laravelapp');    
    try {
        $connection = new PDO("mysql:host=".server.";dbname=".database, user, password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection failed: " .$e->getMessage();
        $connection = null;
    }   
?>