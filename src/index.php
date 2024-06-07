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
              </div>
          </form>
          </li>
          <ul class="navbar-nav d-flex flex-row nav-border-l ms-3 me-3 align-items-center">
            <li class="nav-item">
              <?php
            if (!isset($_SESSION['senha']) || !isset($_SESSION['email'])){
        echo "<a class='fs-5 btn btn-dark nav-under rounded-4 ms-3' href='login.php'>Login</a>";
      }
      else{
        echo "<a class='fs-5 btn btn-dark nav-under rounded-4 ms-3' href='back/logout.php'>Logout</a>";
      }
      ?>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navDrop" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <img src="..\images\matt.webp" class="rounded-circle" height="40" alt="" loading="lazy" />
              </a>
              <ul id="navDrop" class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Perfil</a></li>
                <li><a class="dropdown-item" href="#">Jogos</a></li>
                <li><a class="dropdown-item" href="#">Menu desenvolvedor</a></li>
              </ul>
        </div>
      </ul>
      <button class="btn btn-primary d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop"
        aria-controls="offcanvasTop"><i class="bi bi-list h1"></i></button>
    </div>
    </li>
    </ul>
    </ul>
    <div class="offcanvas offcanvas-top bg-primary d-lg-none" tabindex="-1" id="offcanvasTop"
      aria-labelledby="offcanvasTopLabel">

      <div class="offcanvas-header d-flex align-items-center">
        <div class="offcanvasTopLabel d-flex" id="offcanvasLabel">
          <img height="50" src="../images/GRlogo.png" alt="">
          <p class="fs-2 m-0" style="font-family: GRfont;">GameRail</p>
        </div>
        <li class="nav-item nav-mobile mb-2 rounded-4 d-flex justify-content-center">
              <a class="fs-5 btn btn-dark nav-under rounded-4 ms-3" href="login.php">Login</a>
        <li class="nav-link nav-item dropdown ms-3 mb-2">
              <a class="nav-link dropdown-toggle" href="#" id="navDrop" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <img src="..\images\matt.webp" class="rounded-circle" height="40" alt="" loading="lazy" />
              </a>
              <ul id="navDrop" class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Perfil</a></li>
                <li><a class="dropdown-item" href="#">Jogos</a></li>
                <li><a class="dropdown-item" href="#">Menu desenvolvedor</a></li>
              </ul>
            </li>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>

      <div class="offcanvas-body">
        <ul class="navbar-nav">
        <form class="d-flex justify-content-center mb-1">
            <li class="outline-primary" style="width: 250px;">
              <input type="search" class="form-control form-control-lg rounded-4 mb-1" placeholder="Pesquisar jogos">
            </li>
          </form>
            </li>
          <li>
            <a class="nav-link nav-mobile mb-2 rounded-4  d-flex justify-content-center" href="#">Descontos</a>
          </li>
          <li>
            <a class="nav-link nav-mobile mb-2 rounded-4 d-flex justify-content-center" href="#">Categorias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-mobile mb-2 rounded-4 d-flex justify-content-center" href="#">Populares</a>
          </li>
          </li>
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
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
    <script>
      $(function () {
        $('.dropdown-toggle').dropdown();
      });
    </script>