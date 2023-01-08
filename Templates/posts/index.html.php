<h2 class="text-underline">Article :</h2>

<?php foreach ($posts as $post) :  ?>
    <div class="post d-flex align-items-center justify-content-between border mt-3">
        <div class="d-flex flex-column m-1">
            <h3><?= $post["title"] ?></h3>
            <p><?= $post["content"] ?></p>
        </div>
        <a href="post.php?id=<?= $post['id'] ?>" class="btn border text-danger-emphasis m-1">Voir +</a>
    </div>
<?php endforeach; ?>
