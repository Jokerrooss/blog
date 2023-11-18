<?php

include 'partials/header.php'; 

$query = "SELECT * FROM posts";
$posts = mysqli_query($connection, $query);

?>

  <header class="hero-img" id="home">
    <div class="hero-text text-center p-2">
      <h2>witajcie na moim <span class="underline">blogu.</span> </h2>
      <a href="#aboutus" class="post__btn text-decoration-none text-dark mt-2 text-uppercase">poznaj mnie</a>
    </div>
    <div class="hero-shadow"></div>
    <a href="#aboutus"><i class="fa-solid fa-chevron-down bounce-top"></i></a>
  </header>

  <section class="py-5">
    <div class="container">
      <div class="aboutus" id="aboutus">
        <div class="aboutus__img"></div>
        <div class="aboutus__text">
          <div class="aboutus__text--center">
            <h2 class="py-2 title">Lorem, ipsum dolor.</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste et illo tempore fuga! Sequi eum recusandae
              quas porro fugiat ab nesciunt. Incidunt officia est maxime, laudantium soluta nihil repellendus eos
              necessitatibus neque aut unde eum deleniti hic laborum ipsam a. Quo sit, fugiat molestias architecto
              ducimus
              consequuntur beatae omnis, quas earum sint totam suscipit voluptatibus tempore tempora. Dicta, numquam sed
              porro distinctio earum quis quae dignissimos expedita nam voluptate totam aut impedit debitis, beatae
              soluta
            </p>
          </div>

        </div>
      </div>
    </div>
  </section>

  <section class="posts py-5" id="blog">
    <div class="container posts__container">
    <?php while($post = mysqli_fetch_assoc($posts)) : ?>
    <article class="post">
        <div class="post__thumbnail">
          <img src="./img/<?= $post['thumbnail'] ?>" alt="asdasdasd">
        </div>
        <div class="post__info">
          <h3 class="post__title"> 
            <a href="post.php"><?= $post['title'] ?></a>
          </h3>
          <p class="post__body"><?= substr($post['body'], 0, 300) ?>...</p>
          <button class="post__btn"><a href="post.php?id=<?= $post['id']?>">Czytaj więcej</a></button>
        </div>

      </article>
      <?php endwhile ?>
    </div>
  </section>

<?php

include'partials/footer.php';

?>