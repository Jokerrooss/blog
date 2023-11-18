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
  <link rel="stylesheet" href="css/style.css">

</head>

<body data-bs-spy="scroll" data-bs-target="#navId">

  <nav id="navId" class="navbar navbar-expand-lg position-fixed top-0 w-100 py-3">
    <div class="container">
      <a class="navbar-brand" href="#"><i class="fa-solid fa-headset"> progamers</span></i></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa-solid fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <a class="nav-link active" href="#home">home</a>
          <a class="nav-link" href="#aboutus">o mnie</a>
          <a class="nav-link" href="#blog">blog</a>

        </div>
      </div>
    </div>
  </nav>

  <section class="posts py-5" id="blog">
    <div class="container posts__container">

      <article class="post">
        <div class="post__thumbnail">
          <img src="./img/post1.jpg" alt="asdasdasd">
        </div>
        <div class="post__info">
          <h3 class="post__title"> <a href="post.html">Lorem ipsum dolor sit, amet consectetur adipisicing</a>
          </h3>
          <p class="post__body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis tempora aliquam labore
            odio autem, repellendus amet quod illum consequuntur et velit ex beatae.</p>
          <button class="post__btn">Czytaj więcej</button>
        </div>

      </article>

    </div>
  </section>

  <footer class="bg-dark text-light py-4 text-center">
    <p class="mb-0">&copy; 2045 | ProGamers</p>
  </footer>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
    <script src="./js/script.js"></script>
</body>

</html>