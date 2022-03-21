<?php session_start(); 
        include('../../path.php');

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://use.fontawesome.com/8c560aa462.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/admin.css">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@700&display=swap" rel="stylesheet">

    <title>Hello, world!</title>
  </head>
  <body>
    <!--header-->

        <?php include("../../app/include/header_admin.php");?>

    <!--end header-->
    <!-- основной блок -->
    <div>
    <?php include("../../app/include/sidebar-admin.php");?>
            <div class="posts col-9">
                <div class="button row">
                    <a href="create.php" class="col-3 btn btn-primary">Создать</a>
                    <span class="col-1"></span>
                    <a href="index.php" class="col-3 btn btn-primary">Управление</a>
                </div>
                <div class="row title-table">
                    <h2>Управление пользователями</h2>
                    <div class="id col-1">ID</div>
                    <div class="title col-2">Имя</div>
                    <div class="author col-2">Фамилия</div>
                    <div class="author col-3">Почта</div>
                    <div class="id col-1">Роль</div>
                    <div class="red col-2">Управление</div>
                </div>
                <div class="row post">
                <div class="id col-1">ID</div>
                    <div class="title col-2">Имя</div>
                    <div class="author col-2">Фамилия</div>
                    <div class="author col-3">Почта</div>
                    <div class="id col-1">Роль</div>
                    <div class="red col-1"><a class="red" href="#">edit</a></div>
                    <div class="del col-1"><a class="del" href="#">del</a></div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>
<!-- flexbox !>