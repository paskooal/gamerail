  <?php session_start(); ?>
  <!doctype html>
  <html lang="pt-br">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <body class="tpg bg-img2">
    <!--navbar-->
    <nav class="navbar navbar-expand-lg bg-primary shadow-gg fs-5">
      <div class="container-fluid justify-content-center">
        <ul class="navbar-nav mb-2 mt-2 align-items-center mx-auto">
          <li class="me-3 d-flex">
            <img height="50" src="../images/GRlogo.png" alt="">
            <p class="fs-2 m-0" style="font-family: GRfont;">GameRail</p>
          </li>
          <div class="d-lg-flex d-none d-lg-block">
            <li class="nav-item nav-border-l">
              <a class="nav-link nav-under" href="#">Descontos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-under" href="#">Categorias</a>
            </li>
            <li class="nav-item  nav-border-r">
              <a class="nav-link nav-under" href="#">Populares</a>
            </li>
            <form class="ms-3">
              <li class="outline-primary d-flex" style="width: 250px;">
                <div class="">
                  <input type="search" class="form-control form-control-lg rounded-4" placeholder="Pesquisar jogos">
                  <span></span>
                </div>
            </form>
            </li>
            <ul class="navbar-nav d-flex flex-row nav-border-l ms-3 me-3 align-items-center">
              <li class="nav-item">
                <a class="fs-5 btn btn-dark nav-under rounded-4 ms-3" href="login.php">Login</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navDrop" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="..\images\matt.webp" class="rounded-circle" height="40" alt="" loading="lazy" />
                </a>
                <ul id="navDrop" class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Perfil</a></li>
                  <li><a class="dropdown-item" href="#">Jogos</a></li>
                  <li><a class="dropdown-item" href="#">Menu desenvolvedor</a></li>
                </ul>
          </div>
        </ul>
      
      <button class="btn btn-primary d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop"><i  class="bi bi-list"></i></button>
    </div>
      </li>
      </ul>
      </ul>
      <div class="offcanvas offcanvas-top bg-primary d-lg-none" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvasTopLabel d-flex" id="offcanvasLabel">
            <img height="50" src="../images/GRlogo.png" alt="">
            <p class="fs-2 m-0" style="font-family: GRfont;">GameRail</p>
          </h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav">
            <li>
              <a class="nav-link nav-under mb-1" href="#">Descontos</a>
            </li>
            <li>
              <a class="nav-link nav-under mb-1" href="#">Categorias</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-under mb-1" href="#">Populares</a>
            </li>
            <form class="">
              <li class="outline-primary mb-1" style="width: 250px;">
                <div class="">
                  <input type="search" class="form-control form-control-lg rounded-4" placeholder="Pesquisar jogos">
                </div>
            </form>
            </li>
            <ul class="navbar-nav">
              <li>
                <a class="fs-5 btn btn-dark nav-under rounded-4" href="login.php">Login</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navDrop" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="..\images\matt.webp" class="rounded-circle" height="40" alt="" loading="lazy" />
                </a>
                <ul id="navDrop" class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Perfil</a></li>
                  <li><a class="dropdown-item" href="#">Jogos</a></li>
                  <li><a class="dropdown-item" href="#">Menu desenvolvedor</a></li>
                </ul>
        </div>
        </ul>
      </div>
      </div>
      </div>
      </div>
      </li>
      </div>
      </div>
    </nav>
    <!--site base-->
    <div class="color-overlay">
      <div class="container py-5 h-100 gradient-custom2 shadow-lg">
        <i class="fa fa-search"></i>
        <a href="back/logout.php">Deslogar</a>
        <h1>Teste 123 nha loló</h1>
        <?php
        ?>
        <div>
        </div>
        <?php
        var_dump($_SESSION['username']);
        if (!isset($_SESSION['senha']) || !isset($_SESSION['email']))
        ?>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
      <script>
        $(function() {
          $('.dropdown-toggle').dropdown();
        });
      </script>
