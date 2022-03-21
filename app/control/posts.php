<?php

include("../../app/database/db.php");
include("../../path.php");
if(!$_SESSION){
    header('location' . BASE_URL . 'login.php');
}

$errMsg = '';
$title = '';
$content = '';
$img = '';

$posts = selectAll('posts');
$postAdm = selectAllFromPostsWithUsers('posts', 'users');

// добавление картинки и создание записи

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_post'])){
    if(!empty($_FILES['img']['name'])){
        $imgName = time() . '...' . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileTmpType = $_FILES['img']['type'];
        $destination = realpath(dirname(__FILE__)) . "\img\posts\\" . $imgName;

        if(strpos($fileTmpType, 'image') === false){
            die("Ошибка! Можно загружать только изображения");
        }

        $result = move_uploaded_file($fileTmpName, $destination);
        if($result){
            $_POST['img'] = $imgName;
        }else{
            $errMsg = "Ошибка загрузки изображения на сервер";
        }
    }else{
        $errMsg = "Ошибка получения картинки";
    }

    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $img = trim($_POST['img']);


    if($title === '' || $content === ''){
        $errMsg = "Не все поля заполнены!";
    }else{
        $post = [
            'id_user' => $_SESSION['id'],
            'title' => $title,
            'content' => $content,
            'img' => $img,
            'status' => 1
        ];
        $post = insert('posts', $post);
        $post = selectOne('posts', ['id' =>$id]);
        header('location:' . BASE_URL . '/admin/posts/index.php');
    }
}

// edit 

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
   $id = $_GET['id'];
   $post = selectOne('posts', ['id' => $id]); 
   
   $id = $post['id'];
   $title = $post['title'];
   $content = $post['content'];
   $publish = $post['status'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_post'])){
    $id = $_POST['id'];
    
    if(!empty($_FILES['img']['name'])){
        
        $imgName = time() . '...' . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileTmpType = $_FILES['img']['type'];
        $destination = realpath(dirname(__FILE__)) . "\img\posts\\" . $imgName;

        if(strpos($fileTmpType, 'image') === false){
            die("Ошибка! Можно загружать только изображения");
        }

        $result = move_uploaded_file($fileTmpName, $destination);
        if($result){
            $_POST['img'] = $imgName;
        }else{
            $errMsg = "Ошибка загрузки изображения на сервер";
        }
    }else{
        $errMsg = "Ошибка получения картинки";
    }

    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $img = trim($_POST['img']);
        
    if($img == ''){
        $img = selectOne('posts', ['id' => $id]); 
        $img = $img['img'];
    }

    if($title === '' || $content === ''){
        $errMsg = "Не все поля заполнены!";
    }else{
        $post = [
            'id_user' => $_SESSION['id'],
            'title' => $title,
            'content' => $content,
            'img' => $img,
            'status' => 1
        ];
        $post = update('posts', $id, $post);
        header('location:' . BASE_URL . '/admin/posts/index.php');
    }

}

//публикация 

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])){
    $id = $_GET['pub_id'];
    $publish =  $_GET['publish'];
    $post = update('posts', $id, ['status' => $publish]);
    header('location:' . BASE_URL . '/admin/posts/index.php');
    exit();
}

// удаление

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])){
    $id = $_GET['del_id'];
    delete('posts', $id);
    header('location:' . BASE_URL . '/admin/posts/index.php');
}

?>