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
                <div class="id col-1">ID</div>
                <div class="title col-3">Название</div>
                <div class="author col-3">Автор</div>
                <div class="red col-4">Управление</div>
            </div>
            <?php foreach ($postAdm as $key => $post):?>
            <div class="row post">
                <div class="id col-1"><?=$key + 1;?></div>
                <div class="title col-4"><?=
                    mb_substr($post['title'], 0, 20, 'UTF-8');
                    
                ?></div>
                <div class="author col-1"><?=$post['name'];?></div>
                <div class="author col-1"><?=$post['family'];?></div>
                <div class="red col-1"><a class="red" href="edit.php?id=<?=$post['id'];?>">edit</a></div>
                <div class="del col-1"><a class="del" href="edit.php?del_id=<?=$post['id'];?>">del</a></div>
                <?php if($post['status'] == 1):?>
                    <div class="del col-2"><a class="del" href="edit.php?publish=0&pub_id=<?=$post['id'];?>">В черновик</a></div>
                <?php else: ?>
                    <div class="del col-1"><a class="del" href="edit.php?publish=1&pub_id=<?=$post['id'];?>">Опубликовать</a></div>
                <?php endif;?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- flexbox !>