<?php
//faire tout le nécéssaire pour récupérer le contenu de l'article depuis $_POST
//et le sauvegarder dans la DB à l'aide de PDO

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
    header('Location: index.php');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ALED</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container d-flex align-items-center justify-content-between">
            <a id="logo" class="navbar-brand text-light" href="#">LOGO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end text-light" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-success" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="createPost.php">CreatePost</a>
                    </li>
                    <li>
                        <a class="nav-link text-danger" href="#">Lien</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header> <!-- BAR DE NAVIGATION-->

<div class="container mt-5">
    <h1>nouveau post</h1>
    <form action="" method="post">
        <input type="text" name="title" id="">
        <input type="text" name="content" id="">
        <input type="submit" value="Envoyer">
    </form>
</div>
