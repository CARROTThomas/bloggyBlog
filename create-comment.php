<?php
require_once ('librairie/tools.php');

$id = null;
$content= null;
if (!empty($_POST['id']) && ctype_digit($_POST['id']))
{
    $id = $_POST['id'];
}
if (!empty($_POST['content']))
{
    $content = $_POST['content'];
}

if ($id && $content)
{
    require_once ('pdo.php');
    $request = $pdo->prepare('INSERT INTO comments SET content= :content, post_id= :id');
    $request->execute([
        "content"=> $content,
        "id"=>$id
    ]);
}

redirect("post.php?id=${id}");
?>
