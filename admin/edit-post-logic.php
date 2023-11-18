<?php
session_start();
require 'config/database.php';

if (isset($_POST['submit'])){
    $id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
    $previous_thumbnail_name = filter_var($_POST['previous_thumbnail_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $thumbnail = $_FILES['thumbnail'];

    if(!$title){
        $_SESSION['edit-post'] = "Nie udało się zaktualizować wpisu. Nieprawidłowe dane formularza";
    }elseif(!$body){
        $_SESSION['edit-post'] = "Nie udało się zaktualizować wpisu. Nieprawidłowe dane formularza";
    }else{
        if($thumbnail['name']){
            $previous_thumbnail_path = '../img/' . $previous_thumbnail_name;
            if($previous_thumbnail_path){
                unlink($previous_thumbnail_path);
            }

            $time = time();
            $thumbnail_name = $time . $thumbnail['name'];
            $thumbnail_tmp_name = $thumbnail['tmp_name'];
            $thumbnail_destination_path = '../img/' . $thumbnail_name;

            $allowed_files = ['png', 'jpg', 'jpeg'];
            $extension = explode('.', $thumbnail_name);
            $extension = end($extension);
            if(in_array($extension, $allowed_files)){
                if($thumbnail['size'] < 2000000){
                    move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path);
                }else{
                    $_SESSION['edit-post'] = "Za duży plik. Max 2mb";
                }
            }else{
                $_SESSION['edit-post'] = "Plik powinien być png jpg lub jpeg";
            }
        }
    }

    if($_SESSION['edit-post']){
        header('location: ' . ROOT_URL . 'admin/');
        die();
    }else{
        $thumbnail_to_insert = $thumbnail_name ?? $previous_thumbnail_name;
        $query = "UPDATE posts SET title ='$title', body='$body', thumbnail='$thumbnail_to_insert' WHERE id=$id LIMIT 1";
        $result = mysqli_query($connection, $query);

        if(!mysqli_errno($connection)){
            $_SESSION['edit-post-success'] = "Post zaktualizowany";
            header('location: ' . ROOT_URL . 'admin/');
            die();
        }
    }
}

header('location: ' . ROOT_URL . 'admin/');
die();