<?php

$id = null;
if (!empty($_GET['id']) && ctype_digit($_GET['id']))
{
    echo "ok";
    $id = $_GET['id'];
}

require_once ('pdo.php');

$requestDelete = $pdo->prepare('DELETE FROM posts WHERE id= :id');
$requestDelete->execute([
    "id"=>$id
]);

header('Location: index.php');
?>