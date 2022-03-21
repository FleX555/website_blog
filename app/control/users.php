<?php
include("app/database/db.php");

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg']))
{
    $name = trim($_POST['name']);
    $family = trim($_POST['family']);
    $email = trim($_POST['email']);
    $passF = trim($_POST['pass']);
    $passS = trim($_POST['repeat-pass']);
    $admin = 0;

    if($name === '' || $family ==='' || $email === '' || $passF === '' || $passS === ''){
        $errMsg = "Ошибка! Заполните все поля";
    }elseif($passF !== $passS){
        $errMsg = "Ошибка! Пароли не совпадают";
    }else{

        $existence = selectOne('users', ['email' => $email]);
        if($existence['email'] === $email){
            $errMsg = "Пользователь с такой почтой уже зарегистрирован!";
        }else{
        $post = [
            'admin' => $admin,
            'name' => $name, 
            'family' => $family,
            'email' => $email,
            'password' => $passS
        ];
    
        //test($post);
        //insert('users', $post);
        //
        $id = insert('users', $post);
        $user = selectOne('users', ['id' => $id]);

        $_SESSION['id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['family'] = $user['family'];
        $_SESSION['admin'] = $user['admin'];

        header('Location: '. BASE_URL);
        //test($_SESSION);
        }   
    }

}else{
    $name = '';
    $family = '';
    $email = '';
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])){

    $email = trim($_POST['email']);
    $passF = trim($_POST['pass']);

    if($email === '' || $passF === ''){
        $errMsg = "Ошибка! Заполните все поля";
    }else{

        $existence = selectOne('users', ['email' => $email]);

        if($existence && $passF === $existence['password']){
            $_SESSION['id'] = $existence['id'];
            $_SESSION['name'] = $existence['name'];
            $_SESSION['family'] = $existence['family'];
            $_SESSION['admin'] = $existence['admin'];
            if($_SESSION['admin'] === '1'){
                header('Location: '. '../../admin/posts/index.php');  
            }else{
                header('Location: '. '../../index.php');  
            }
            
        }else{
            $errMsg = "Ошибка! Почта либо пароль введены неверно!";
        }
    }
}else{
    $email = '';
}
 // доделать
?>