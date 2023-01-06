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

$request = $pdo->query("SELECT * FROM posts");
$posts = $request->fetchAll();
//print_r($posts); //affiche le tableau brutalement sur la page




ob_start();
require_once ('templates/posts/index.html.php');

$pageContent = ob_get_clean();

require_once ('templates/base.html.php');

?>