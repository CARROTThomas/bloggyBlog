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
);

$id = "";
$id = $_POST['id'];
$requestDelete = $pdo->prepare('DELETE FROM posts WHERE id= :id');
$requestDelete->execute([
    "id"=>$id
]);
header('Location: index.php');
?>