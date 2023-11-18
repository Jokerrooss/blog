<?php
session_start();
require 'config/database.php';

if(isset($_POST['submit'])){
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $thumbnail = $_FILES['thumbnail'];


    if(!$title){
        $_SESSION['add-post'] = "Wpisz tytuł postu";
    }elseif(!$body){
        $_SESSION['add-post'] = "Wpisz opis postu";
    }elseif(!$thumbnail['name']){
        $_SESSION['add-post'] = "Wybierz zdjęcie postu";
    }else{
        $time = time();
        $thumbnail_name = $time . $thumbnail['name'];
        $thumbnail_tmp_name = $thumbnail['tmp_name'];
        $thumbnail_destination_path = '../img/' . $thumbnail_name;
        
        $allowed_files = ['png', 'jpg', 'jpeg'];
        $extension = explode('.', $thumbnail_name);
        $extension = end($extension);
        if(in_array($extension, $allowed_files)){
            if($thumbnail['size'] < 2_000_000){
                move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path);
            }else{
                $_SESSION['add-post'] = "Za duży plik. Max 2mb";
            }
        }else{
            $_SESSION['add-post'] = "Plik powinien być png jpg lub jpeg";
        }
    }

    if(isset($_SESSION['add-post'])){
        $_SESSION['add-post-data'] = $_POST;
        header('location: ' . ROOT_URL . 'admin/add-post2.php');
        die();
    }else{
        $query = "INSERT INTO posts(title, body, thumbnail) VALUES ('$title', '$body', '$thumbnail_name')";
        $result = mysqli_query($connection, $query);

        if(!mysqli_errno($connection)){
            $_SESSION['add-post-success'] = "Nowy post dodany";
            header('location: ' . ROOT_URL . 'admin/');
            die();
        }
    }
}

header('location: ' . ROOT_URL . 'admin/add-post2.php');
die();