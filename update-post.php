<?php

require_once ('pdo.php');
require_once ('librairie/tools.php');

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
        redirect("index.php");
    }

}

if ($title && $content) {
    $requestDelete = $pdo->prepare("UPDATE posts SET title = :title, content = :content WHERE posts.id = :id");
    $requestDelete->execute([
        "title" => $title,
        "content" => $content,
        "id" => $id
    ]);
    redirect("post.php?id=${id}");
}

render("posts/update", [
    "post"=>$post,
    "pageTitle"=>"Update le Post"
]);
?>