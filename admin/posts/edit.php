<?php 
    include("../../app/control/posts.php");
    include("../../path.php");
?>

<!doctype html>
<html lang="ru">
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
                    <a href="create.php" class="col-3 btn btn-primary">Добавить пост</a>
                    <span class="col-1"></span>
                    <a href="index.php" class="col-3 btn btn-primary">Менеджер постов</a>
                </div>
                <div class="row title-table">
                    <h2>Управление записями</h2>
                </div>
                <div class="row add-post">
                    <form action="edit.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?=$id; ?>">
                        <div class="col">
                            <label class="form-label">Название записи</label>
                            <input name="title" type="text" class="form-control" aria-label="title" value="<?=$title;?>">
                        </div>
                        <div class="col">
                            <label for="editor" class="form-label">Содержимое записи</label>
                            <textarea name="content" id="editor" class="form-control" rows="6"><?=$content;?></textarea>
                        </div>
                        <div class="input-group col">
                            <div class="form-file">
                            <input name="img" type="file" class="form-control" id="inputGroupFile02">
                            <label class="form-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02"></label>
                        <div class="col">
                            <button name="edit_post" class="btn btn-primary" type="submit">Сохранить запись</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!--Визуальный редактор-->
    <script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
    <script src="../../app/js/script.js"></script>
  </body>
</html>
<!-- flexbox !>