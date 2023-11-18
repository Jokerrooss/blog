<?php

include 'partials/header.php';
$query = "SELECT id, title FROM posts ORDER BY id DESC";
$posts = mysqli_query($connection, $query);

?>

<section class="dashboard">
    <div class="container">
        <?php session_start(); if (isset($_SESSION['add-post-success'])) : ?>
            <div class="alert__message success">
                <p><?= $_SESSION['add-post-success']; 
                    unset($_SESSION['add-post-success']); ?>
                </p>
            </div>
        <?php elseif (isset($_SESSION['edit-post-success'])) : ?>
            <div class="alert__message success">
                <p><?= $_SESSION['edit-post-success']; 
                    unset($_SESSION['edit-post-success']); ?>
                </p>
            </div>
        <?php elseif (isset($_SESSION['edit-post'])) : ?>
            <div class="alert__message error">
                <p><?= $_SESSION['edit-post']; 
                    unset($_SESSION['edit-post']); ?>
                </p>
            </div>
        <?php elseif (isset($_SESSION['delete-post-success'])) : ?>
            <div class="alert__message success">
                <p><?= $_SESSION['delete-post-success']; unset($_SESSION['delete-post-success']); ?></p>
            </div>
        <?php endif ?>

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
                <h2>Zarządzanie Postami</h2>
                <?php if (mysqli_num_rows($posts) > 0) : ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Tytuł</th>
                                <th>Edycja</th>
                                <th>Usuwanie</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($post = mysqli_fetch_assoc($posts)) : ?>
                                <tr>
                                    <td><?= $post['title'] ?></td>
                                    <td><a href="<?= ROOT_URL ?>admin/edit-post.php?id=<?= $post['id'] ?>" class="btn-edit">Edytuj</a></td>
                                    <td><button onclick="confirmDelete(<?= $post['id'] ?>)" class="btn-delete">Usuń</button></td>
                                </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <div class="alert__message error"><?= "Posty nieznalezione" ?></div>
                <?php endif ?>
            </main>
        </div>
    </div>
</section>

<script>
    function confirmDelete(idPosta) {
        const confirmDel = confirm("Czy na pewno chcesz skasować ten post?");

        if (confirmDel) {
            window.location.href = "<?= ROOT_URL ?>admin/delete-post.php?id=" + idPosta;
        }
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
<script src="../js/script.js"></script>
</body>

</html>