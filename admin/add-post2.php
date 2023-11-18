<?php

include 'partials/header.php'; 
$title = $_SESSION['add-post-data']['title'] ?? null;
$body = $_SESSION['add-post-data']['body'] ?? null;

unset($_SESSION['add-post-data']);
?>


    <section class="dashboard">
        <div class="container">
            <div class="dashboard__container">
            <aside>
                    <ul>
                        <li>
                            <a href="<?= ROOT_URL ?>admin/add-post2.php">
                                <i class="fa-solid fa-plus"></i>
                                <p class="dashboard__text-menu">Dodaj Post</p>
                            </a>
                        </li>
                        <li>
                            <a href="<?= ROOT_URL ?>admin/index.php" class="light-active">
                                <i class="fa-solid fa-pen-to-square"></i>
                                <p class="dashboard__text-menu">Zarządzaj Postem</p>
                            </a>
                        </li>
                    </ul>
                </aside>
                <main>
                    <section class="form__section">
                        <div class="container form__section-container">
                            <h2>Dodaj Post</h2>
                            <?php session_start(); if(isset($_SESSION['add-post'])) : ?>
                            <div class="alert__message error">
                                <p>
                                   <?= $_SESSION['add-post'];
                                   unset($_SESSION['add-post']); ?> 
                                </p>
                            </div>
                            <?php endif ?>
                            <form action="<?= ROOT_URL ?>admin/add-post-logic.php" enctype="multipart/form-data" method="POST">
                                <input type="text" name="title" value="<?= $title ?>" placeholder="Tytuł">
                                <textarea rows="15" name="body" placeholder="Opis"><?= $body ?></textarea>
                                <div class="form__control">
                                    <label for="thumbnail">Dodaj obrazek</label>
                                    <input type="file" name="thumbnail" id="thumbnail">
                                </div>
                                <button type="submit" name="submit" class="btn">Dodaj post</button>

                            </form>
                        </div>
                    </section>

                </main>
            </div>


        </div>
    </section>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="../js/script.js"></script>
</body>

</html>