<?php
require_once ('librairie/tools.php');


$title = "";
$content = "";

if( !empty($_POST['title']) ){
    $title = $_POST['title'];
}
if( !empty($_POST['content']) ){
    $content = $_POST['content'];
}

if ($title && $content) {
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

    $request = $pdo->prepare('INSERT INTO posts SET title = :title, content= :content');
    $request->execute([
       "title"=> $title,
       "content"=> $content
    ]);
    redirect("index.php");
}


render("posts/create", [
    "pageTitle"=>"Création d'un post"
]);
?>





