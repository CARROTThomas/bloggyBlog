<?php

$id =null;

if (!empty($_GET['id']) && ctype_digit($_GET['id']))
{
    $id = $_GET['id'];
}

if ($id)
{
    require_once('pdo.php');

    $request = $pdo->prepare('SELECT * FROM posts WHERE id= :id');
    $request->execute([
       "id" => $id
    ]);
    $post = $request->fetch();

    if (!$post) {header('Location: index.php');} // Post introuvable
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ALED</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container d-flex align-items-center justify-content-between">
            <a id="logo" class="navbar-brand text-light" href="index.php">LOGO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end text-light" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-success" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="createPost.php">CreatePost</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header> <!-- BAR DE NAVIGATION-->


<div class="container mt-5">
    <a href="index.php" class="btn d-flex align-items-center m-3"><span class="material-symbols-outlined">keyboard_arrow_left</span>Retour</a>

    <div class="d-flex justify-content-between border">
        <div class="d-flex flex-column m-1">
            <h3><?= $post["title"] ?></h3>
            <p><?= $post["content"] ?></p>
        </div>
        <div class="d-flex flex-column">
            <a href="delete-post.php?id=<?= $post['id'] ?>" class="btn border m-1">Delete</a>
            <a href="update-post.php?id=<?= $post['id'] ?>" class="btn border m-1">Update</a>
        </div>
    </div>
</div>

</div>
</body>
</html>


