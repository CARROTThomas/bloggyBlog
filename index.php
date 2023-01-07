<?php
require_once ('librairie/tools.php');
require_once ('pdo.php');


$request = $pdo->query("SELECT * FROM posts");
$posts = $request->fetchAll();
//print_r($posts); //affiche le tableau brutalement sur la page




render("posts/index", [
    "posts"=>$posts,
    "pageTitle"=>"accueil du blog"
]);
?>