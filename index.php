<?php include("path.php");
      include("app/database/db.php");
      $posts = selectAllFromPostsWithUsersOnIndex('posts', 'users');
      //test($posts);
      
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
  <?php 
  if($_SESSION['admin'] == 1) 
    include("app/include/header_admin.php");
  else
    include("app/include/header.php")
  ?>
  

<!--end header-->
<!-- основной блок -->
<div class="container">
    <div class="content row">
      <div>
        <h2 id="text-title">Последние новости</h2>
      </div>
      <div class="main-content col-md-9">
        <?php foreach ($posts as $post):?> 
          <div class="post row">
              <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="<?=BASE_URL . '/app/control/img/posts/' . $post['img']?>" class="d-block w-100" alt="<?=$post['title'] ?>">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            <div class="post_text col-12 col-8">
              <h2 class="text-title">
                <?php if(strlen($post['title']) > 23):?>
                  <a href="<?=BASE_URL . 'single.php?post=' . $post['id']?>"><?=mb_substr($post['title'], 0, 23, 'UTF-8') . '...' ?></a>
                <?php else:?>
                  <a href="<?=BASE_URL . 'single.php?post=' . $post['id']?>"><?=mb_substr($post['title'], 0, 23, 'UTF-8')?></a>
                <?php endif?>
              </h2>
              <i><?=$post['name'] . ' ' . $post['family']?></i>
              <i><?=$post['date'] ?></i>
              <?php if(strlen($post['content']) > 200):?>
                <p class="preview-text"><?=mb_substr($post['content'], 0, 200, 'UTF-8') . '...' ?></p>
              <?php else:?>
                <p class="preview-text"><?=mb_substr($post['content'], 0, 200, 'UTF-8') ?></p> 
              <?php endif?>
            </div>
          </div>
        <? endforeach; ?>
      </div>
    </div>
  </div>
<!-- основной блок -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>


<!-- flexbox !>