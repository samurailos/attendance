<?php
    $host = 'localhost';
    $db = 'attendance_db';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';
    
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try{
        $pdo = new PDO($dsn, $user, $pass);
        //echo 'Hi there Database';
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }catch(PDOException $e) {
        throw new PDOException($e->getMessage());
        //echo "<h1 class='text-danger'>No Database detected</h1>";
    }

    require_once 'crud.php';
    $crud = new crud($pdo);
    
?>