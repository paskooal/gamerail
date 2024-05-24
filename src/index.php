<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="main.css">
    <title>Início</title>
  </head>
  <body>
<!--navbar-->
<nav class="navbar navbar-dark navbar-expand-lg bg-primary">
<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <div class="d-flex">
  <img height=50 class="navbar-brand ms-4" src="../images/GRlogo.png" alt="">
  <a style="font-family:mario;" class="navbar-brand fw-bold fs-3"  href="index.php">GAME RAIL</a>
  </div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <ul class="navbar-nav">
      <li class="bg-secondary t-white">
        <a class="nav-link" href="#">Início</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
    <div class="mx-auto me-4">
      <input class="form-control m-sm-2" type="search" placeholder="Search" aria-label="Search">
    </div>
  </div>
</nav>
<!--site base-->
<div>
  <a href="verify/logout">Deslogar</a>
    <h1>Priquito da silva Senior</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

<div>
<?php
session_start();
var_dump($_SESSION['senhaUser']);
if(!isset($_SESSION['senhaUser']) || !isset($_SESSION['email'])){ 
  
  // header('location: login.php');
}
  include("config.php");
?>
</div>
<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script type="module" src="assets/js/starter.js"></script>