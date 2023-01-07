<div class="container mt-5">
    <a href="index.php" class="btn d-flex align-items-center m-3"><span class="material-symbols-outlined">keyboard_arrow_left</span>Retour</a>

    <div class="d-flex justify-content-between border">
        <div class="d-flex flex-column m-1">
            <h3><?= $post["title"] ?></h3>
            <p><?= $post["content"] ?></p>
        </div>
        <div class="d-flex flex-column">
            <a href="delete-post.php?id=<?= $post['id'] ?>" class="btn d-flex align-items-center border m-1"><span class="material-symbols-outlined">delete</span>Delete</a>
            <a href="update-post.php?id=<?= $post['id'] ?>" class="btn d-flex align-items-center border m-1"><span class="material-symbols-outlined">edit</span>Update</a>
        </div>
    </div>


    <div class="d-flex flex-column mt-3">
        <h4>Create Comment :</h4>
        <form action="create-comment.php" method="post">
            <input class="ms-0" type="text" name="content" id="" placeholder="Create comment">
            <input type="hidden" name="id" value="<?= $post['id']?>">
            <input class="btn border" type="submit" value="Create">
        </form>
        <h4>Comments :</h4>
        <?php foreach ($comments as $comment) : ?>
            <div class="d-flex align-items-center justify-content-between border">
                <p class="m-1"><?= $comment['content'] ?></p>
                <div>
                    <a href="delete-comment.php?idC=<?= $comment['id']?>&id=<?= $post['id']?>" class="btn d-flex align-items-center border m-1"><span class="material-symbols-outlined">delete</span>Delete</a>
                    <a href="update-comment.php?idC=<?= $comment['id'] ?>&id=<?= $post['id']?>" class="btn d-flex align-items-center border m-1"><span class="material-symbols-outlined">edit</span>Update</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>