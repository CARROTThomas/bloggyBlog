<?php
$titleEdit = "";
$contentEdit = "";
$id = $_POST['id'];
echo $id;
if( !empty($_POST['titleEdit']) ){
    $titleEdit = $_POST['titleEdit'];
}
if( !empty($_POST['contentEdit']) ){
    $contentEdit = $_POST['contentEdit'];
}
if ($titleEdit && $contentEdit) {
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

    $requestDelete = $pdo->prepare('UPDATE posts SET 
             title = :title, 
             content = :content
             WHERE id= :id'
    );

    $requestDelete->execute([
        "title" => $titleEdit,
        "content" => $contentEdit,
        "id" => $id
    ]);
    header('Location: index.php');
}

$request = $pdo->query("SELECT * FROM posts");
$post = $request->fetchAll();

echo $post;

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
<style>
    form
    {
        margin-top: 30px;
    }
    form>*{
        margin: 10px;
    }
</style>

    <div class="container d-flex flex-column align-items-center">
        <h1 class="mt-5">Edit Msg</h1>
        <div>
            <form class="d-flex flex-column align-items-center" action="" method="post">
                <input type="text" name="titleEdit" value="" placeholder="NEW Title">
                <input type="text" name="contentEdit" value="" placeholder="NEW Content">
                <input type="submit" value="SEND">
            </form>
        </div>
    </div>

</body>
</html>