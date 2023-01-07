<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $pageTitle ?></title>
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
                        <a class="nav-link text-primary d-flex align-items-center" href="createPost.php"><span class="material-symbols-outlined">add_circle</span>CreatePost</a>
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

<div class="container mt-5">

    <?= $pageContent ?>

</div>
</body>
</html>