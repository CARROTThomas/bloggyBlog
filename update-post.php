<?php

require_once ('pdo.php');

$title = null;
$content = null;
$id = null;

if (!empty($_GET['id']) && ctype_digit($_GET['id']))
{
    $id = $_GET['id'];
}
if( !empty($_POST['titleEdit']) ){
    $title = $_POST['titleEdit'];
}
if( !empty($_POST['contentEdit']) ){
    $content = $_POST['contentEdit'];
}


if ($id)
{
    $request = $pdo->prepare('SELECT * FROM posts WHERE id= :id');
    $request->execute([
            "id"=>$id
    ]);

    $post = $request->fetch();
    if(!$post){
        header("Location: index.php");
    }

}

if ($title && $content) {
    $requestDelete = $pdo->prepare("UPDATE posts SET title = :title, content = :content WHERE posts.id = :id");
    $requestDelete->execute([
        "title" => $title,
        "content" => $content,
        "id" => $id
    ]);
    header('Location: post.php?id='.$id);
}




ob_start();
require_once ('templates/posts/update.html.php');

$pageContent = ob_get_clean();

require_once ('templates/base.html.php');
?>