<?php
    $host = 'localhost';
    $username = 'root';
    $password = 'Azicroy45';
    $database = 'university';

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Ошибка подключения к БД: " . $conn->connect_error);
    }
    
?>
