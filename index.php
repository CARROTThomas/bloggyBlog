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

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
    <?php foreach ($posts as $post) :  ?>
        <div class="post d-flex align-items-center justify-content-between border mt-3">
            <div class="d-flex flex-column">
                <h3><?= $post["title"] ?></h3>
                <p><?= $post["content"] ?></p>
            </div>
            <div class="d-flex flex-column">
                <form action="delete-post.php" method="post">
                    <button class="btn border m-1"><input type="hidden" name="id" value="<?= $post['id']?>">delete</button>
                </form>
                <form action="update-post.php" method="post">
                    <button class="btn border m-1"><input type="hidden" name="id" value="<?= $post['id']?>">Edit</button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>