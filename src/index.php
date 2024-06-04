<?php session_start(); ?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/main.css">
  <body class="tpg bg-img2">
<!--navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-gg fs-5">
<div class="container-fluid justify-content-center ms-5 me-5">
    <ul class="navbar-nav mb-2 mt-2 align-items-center mx-auto">
      <li class="me-3 d-flex">
  <img height="50" src="../images/GRlogo.png" alt="">
  <p class="fs-2 m-0" style="font-family: GRfont;">GameRail</p>
</a></li>
        <li class="nav-item nav-border-l">
          <a class="nav-link nav-under" href="#">Descontos insanos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-under" href="#">Categorias</a>
        </li>
        <li class="nav-item  nav-border-r">
          <a class="nav-link nav-under" href="#">Lista de desejos</a>
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
          <a class="fs-5 btn btn-dark nav-under rounded-4 ms-3" href="login.php">Log-in</a>
        </li>
        <li class="me-5 nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navDrop" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="..\images\matt.webp" class="rounded-circle" height="40" alt="" loading="lazy" />
    </a>
  <ul id="navDrop" class="dropdown-menu">
    <li><a class="dropdown-item" href="#">Action</a></li>
    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
  </ul>
</div>
    </ul>
</li>
</ul>
      </ul>
<div class="mobile-toogler d-lg-none">
<a data-bs-toggle="modal" href="">
  <i class="fa-solid fa-bars">modal</i>
</a>
</div>
<div class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
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
if(!isset($_SESSION['senha']) || !isset($_SESSION['email']))
?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
  $(function () {
    $('.dropdown-toggle').dropdown();
  }); 
</script>