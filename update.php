<?php
require 'config/database.php';

if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT updated_at FROM posts WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $post = mysqli_fetch_assoc($result);

    // Zwróć czas ostatniej aktualizacji jako timestamp
    echo json_encode(['updated_at' => strtotime($post['updated_at'])]);
}
?>