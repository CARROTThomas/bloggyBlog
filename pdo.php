<?php
$adresseServeurMySQL = "localhost";
$nomDeDatabase = "blog";
$username = "blogger";
$password = "thomas123";

$pdo = new PDO("mysql:host=$adresseServeurMySQL;dbname=$nomDeDatabase",
    $username,
    $password,
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]

//require_once ('post.php');
);
