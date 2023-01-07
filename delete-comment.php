<?php
require_once ('librairie/tools.php');

$id = null;
$idC = null;

if (!empty($_GET['id']) && ctype_digit($_GET['id']))
{
    $id = $_GET['id'];
}
if (!empty($_GET['idC']) && ctype_digit($_GET['idC']))
{
    $idC = $_GET['idC'];
}

if ($idC)
{
    require_once ('pdo.php');

    $requestDelete = $pdo->prepare('DELETE FROM comments WHERE id= :id');
    $requestDelete->execute([
        "id"=>$idC
    ]);

    redirect("post.php?id=${id}");
}
?>