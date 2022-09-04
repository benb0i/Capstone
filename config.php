<?php
    define('USER', 'root');
    define('PASSWORD', 'Onetwo345');
    define('HOST', 'localhost:3306');
    define('DATABASE', 'azcd');
    try {
        $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
    } catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
    }
?>