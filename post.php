<?php
require_once ('librairie/tools.php');

$id =null;

if (!empty($_GET['id']) && ctype_digit($_GET['id']))
{
    $id = $_GET['id'];
}

if ($id)
{
    require_once('pdo.php');

    // RECUP LE POST SELECTIONÉ
    $request = $pdo->prepare('SELECT * FROM posts WHERE id= :id');
    $request->execute([
       "id" => $id
    ]);
    $post = $request->fetch();


    // RECUP LES COMMENTS DU POST SELECTIONÉ
    $requestComments = $pdo->prepare('SELECT * FROM comments WHERE post_id= :id');
    $requestComments->execute([
            "id"=>$id
    ]);
    $comments = $requestComments->fetchAll();



    if (!$post) {
        redirect("index.php");
    } // Post introuvable
}

// transmettre les variables à la page posts/post.html.php = template
render("posts/post", [
    "post"=>$post,
    "comments"=>$comments,
    "pageTitle"=>"Un post"
]);
?>
