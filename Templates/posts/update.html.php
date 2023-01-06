<div class="container d-flex flex-column align-items-center">
    <h1 class="mt-5">Edit Msg</h1>
    <div>
        <form class="d-flex flex-column align-items-center" action="" method="post">
            <input type="text" name="titleEdit" value="<?= $post['title'] ?>" placeholder="NEW Title">
            <input type="text" name="contentEdit" value="<?= $post['content'] ?>" placeholder="NEW Content">
            <input type="submit" value="MODIFIER">
        </form>
    </div>
</div>
