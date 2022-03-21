<header class="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div id="div-logo">Название похода</div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?php echo BASE_URL ?>">Главная страница</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Что включено</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Галерея</a>
                    <li class="nav-item">
                      <a class="nav-link" href="#">
                        <?php echo $_SESSION['name'] . ' ' .  $_SESSION['family']?>
                      </a>
                    </li> 
                    <li class="nav-item">
                       <a class="nav-link" href="/admin/posts/index.php">
                         Админ панель
                       </a>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link" href="../../logout.php">
                         Выход
                       </a>
                    </li>            
                </ul>
            </div>
        </div>
    </nav>
</header>
