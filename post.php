<?php
session_start();
require 'config/database.php';


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/30aa401543.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./css/style.css">

</head>

<body data-bs-spy="scroll" data-bs-target="#navId">

  <nav id="navId" class="navbar nav-admin navbar-expand-lg position-fixed top-0 w-100 py-3">
    <div class="container">
      <a class="navbar-brand" href="<?= ROOT_URL ?>"><i class="fa-solid fa-blog"> blog</span></i></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa-solid fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <a class="nav-link" href="<?= ROOT_URL ?>#home">home</a>
          <a class="nav-link" href="<?= ROOT_URL ?>#aboutus">o mnie</a>
          <a class="nav-link" href="<?= ROOT_URL ?>#blog">blog</a>
          <a class="nav-link active" href="<?= ROOT_URL ?>admin/index.php">panel</a>

        </div>
      </div>
    </div>
  </nav>

<?php

if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $post = mysqli_fetch_assoc($result);
    }else{
      header('location: ' . ROOT_URL . 'post.php');
      die();
    }
?>

    <section class="singlepost">
        <div class="container singlepost__container">
            <h2 class="header-two"><?= $post['title'] ?></h2>
            <div class="singlepost__thumbnail">
                <img class="image" src="./img/<?= $post['thumbnail'] ?>" alt="asd">
            </div>
            <p class="par"><?= $post['body'] ?></p>
            
        </div>
        
    </section>

    <script>
function updateSite() {
    const postId = <?= $post['id'] ?>;

    fetch('post.php?id=' + postId)
        .then(response => response.text())
        .then(data => {
            
            const parser = new DOMParser();
            const doc = parser.parseFromString(data, 'text/html');

            
            const headerTwoElement = doc.querySelector('.header-two');

           
            const parElement = doc.querySelector('.par');

            
            const imageElement = doc.querySelector('.image');

           
            if (headerTwoElement) {
                const existingHeaderTwoElement = document.querySelector('.header-two');

                
                if (existingHeaderTwoElement) {
                    
                    existingHeaderTwoElement.innerHTML = headerTwoElement.innerHTML;
                } 
            }

            
            if (parElement) {
                const existingParElement = document.querySelector('.par');

                
                if (existingParElement) {
                    
                    existingParElement.innerHTML = parElement.innerHTML;
                } 
            }

            
            if (imageElement) {
                const existingImageElement = document.querySelector('.image');

                
                if (existingImageElement) {
                    
                    existingImageElement.src = imageElement.src;
                } 
            }
        })
        .catch(error => {
            console.error('Błąd podczas pobierania treści:', error);
        });
}

setInterval(updateSite, 1000);

</script>


<?php

include 'partials/footer.php';

?>


