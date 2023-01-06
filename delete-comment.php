<?php

$id = null;
if (!empty($_GET['id']) && ctype_digit($_GET['id']))
{
    $id = $_GET['id'];
}

require_once ('pdo.php');

$requestDelete = $pdo->prepare('DELETE FROM comments WHERE id= :id');
$requestDelete->execute([
    "id"=>$id
]);

header('Location: index.php');

?>