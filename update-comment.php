<?php
require_once ('pdo.php');
require_once ('librairie/tools.php');

$content = null;
$id = null; // id du Post
$idC = null; // id du Comment

if (!empty($_GET['id']) && ctype_digit($_GET['id']))
{
    $id = $_GET['id'];
}
if (!empty($_GET['idC']) && ctype_digit($_GET['idC']))
{
    $idC = $_GET['idC'];
}
if( !empty($_POST['contentEdit']) ){
    $content = $_POST['contentEdit'];
}

if ($id)
{
    $request = $pdo->prepare('SELECT * FROM comments WHERE id= :id');
    $request->execute([
        "id"=>$idC
    ]);
    $comment = $request->fetch();
    if(!$comment){
        redirect("post.php?id=${id}");
    }
}

if ($content) {
    $requestDelete = $pdo->prepare("UPDATE comments SET content = :content WHERE id = :id");
    $requestDelete->execute([
        "content" => $content,
        "id" => $idC
    ]);
    redirect("post.php?id=${id}");
}

render("comments/update", [
    "comment"=>$comment,
    "pageTitle"=>"Update du comment"
]);
?>