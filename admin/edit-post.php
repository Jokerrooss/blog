<?php 

include 'partials/header.php';

if (isset($_GET['id'])){
    $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $post = mysqli_fetch_array($result);
}else{
    header('location: ' . ROOT_URL .'admin/');
    die();
}

?>


    
    <section class="form__section form__edit">
        <div class="container form__section-container">
            <h2 class="mt">Edytuj Post</h2>
            <?php if(isset($_SESSION['add-post'])) : ?>
                <div class="alert__message error">
                    <p>
                        <?= $_SESSION['add-post'];
                        unset($_SESSION['add-post']); ?> 
                    </p>
                </div>
            <?php endif ?>

            <form action="<?= ROOT_URL ?>admin/edit-post-logic.php" enctype="multipart/form-data" method="POST">
                <input type="hidden" name="id" value="<?= $post['id'] ?>">
                <input type="hidden" name="previous_thumbnail_name" value="<?= $post['thumbnail'] ?>">
                <input type="text" name="title" value="<?= $post['title'] ?>" placeholder="Tytuł">
                <textarea rows="10" name="body" placeholder="Opis"><?= $post['body'] ?></textarea>
                <div class="form__control">
                    <label for="thumbnail">Zmień obrazek</label>
                    <input type="file" name="thumbnail" id="thumbnail">
                </div>
                <button type="submit" name="submit" class="btn">Zaktualizuj post</button>

            </form>
        </div>
    </section>

</body>

</html>