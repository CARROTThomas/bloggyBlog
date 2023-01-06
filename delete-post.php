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





ob_start();
require_once ('templates/posts/index.html.php');

$pageContent = ob_get_clean();

require_once ('templates/base.html.php');
?>