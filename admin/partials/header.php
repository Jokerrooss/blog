<?php
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
  <link rel="stylesheet" href="../css/style.css">

</head>

<body data-bs-spy="scroll" data-bs-target="#navId">

  <nav id="navId" class="navbar nav-admin navbar-expand-lg position-fixed top-0 w-100 py-3">
    <div class="container">
      <a class="navbar-brand" href="<?= ROOT_URL ?>"><i class="fa-solid fa-blog"> blog</i></a>
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

