<?php 
  include("path.php");
  include("app/control/users.php");
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
    <link rel="stylesheet" href="css/css.css">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@700&display=swap" rel="stylesheet">

    <title>Hello, world!</title>
  </head>
  <body>
<!--header-->

    <?php include("app/include/header.php");?>

<!--end header-->
      <!--form-->
    <div class="container reg_form">
      <form class="row justify-content-center" method="post" action="reg.php">
        <div class="mb-3 col-12 col-md-4 err">
          <p><?=$errMsg?></p>
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
          <label for="exampleFormControlInput1" class="form-label">Введите имя</label>
          <input name="name" value="<?=$name?>" class="form-control form-control-lg" type="text" aria-label=".form-control-lg example">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
          <label for="exampleFormControlInput2" class="form-label">Введите фамилию</label>
          <input name="family" value="<?=$family?>" class="form-control form-control-lg" type="text" aria-label=".form-control-lg example">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
          <label for="exampleInputEmail1" class="form-label">Введите почту</label>
          <input name="email" type="email" value="<?=$email?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
          <label for="exampleInputPassword1" class="form-label">Введите пароль</label>
          <input name="pass" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
          <label for="exampleInputPassword2" class="form-label">Введите пароль ещё раз</label>
          <input name="repeat-pass" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-6 col-md-4">
          <button type="submit" class="btn btn-primary" name="button-reg">Зарегестрироваться</button>
        </div>
      </form>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!--footer-->
</body>
</html>