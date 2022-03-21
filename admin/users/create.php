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
                <h2>Создание пользователя</h2>
            </div>
            <div class="row add-post">
                <form action="create.php" method="post">
                    <div class="col">
                        <label for="exampleFormControlInput1" class="form-label">Введите имя</label>
                        <input name="name" value="<?=$name?>" class="form-control form-control-lg" type="text" aria-label=".form-control-lg example">
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput2" class="form-label">Введите фамилию</label>
                        <input name="family" value="<?=$family?>" class="form-control form-control-lg" type="text" aria-label=".form-control-lg example">
                    </div>
                        <div class="col">
                        <label for="exampleInputEmail1" class="form-label">Введите почту</label>
                        <input name="email" type="email" value="<?=$email?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="col">
                        <label for="exampleInputPassword1" class="form-label">Введите пароль</label>
                        <input name="pass" type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="col">
                        <label for="exampleInputPassword2" class="form-label">Введите пароль ещё раз</label>
                        <input name="repeat-pass" type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput2" class="form-label">Введите роль</label>  
                        <div class="input-group">
                            <select class="form-select" aria-label="Example select with button addon">
                                <option value="1">Пользователь</option>
                                <option value="2">Администратор</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <button class="btn btn-primary" type="submit">Сохранить запись</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- flexbox !>