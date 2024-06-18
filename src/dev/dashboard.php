<?php session_start();
require '../back/adminLock.php';
?>
<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="stylesheet" href="../../css/main.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<body class="tpg bg-img2">
  <!--navbar-->
  <?php
  require 'devback/devbar.php';
  ?>
  <!--site base-->
  <div class="color-overlay">
    <div class="container py-5 h-100 gradient-custom2 shadow-lg">
      <div class="ms-5 me-5">
        <div class="d-flex mb-3">
          <span class="d-flex fs-2 fw-bold">MENU DESENVOLVEDOR:</span>
          <?php
          echo '<span class="d-flex ms-2 mt-1 fs-3">Seja bem vindo(a), ' . $_SESSION['nome'] . '!</span>';
          ?>               
        </div>
        <div class="row">
          <div class="col-md-4 mb-4">
            <button class="card-img card rounded-4 bg-secondary text-black shadow-gg nav-under w-100 align-items-center" onclick="clickUser()" style="width:18rem;">
              <img src="../../images/loud.png" class="card-img-top rounded-4" alt="...">
              <div class="card-body">
                <h5 class="card-title">Usuários</h5>
                <?php
                $sql = "SELECT * FROM user";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $totalUsers = $stmt->rowCount();
                echo '<p class="card-text d-flex">Total de usuários cadastrados: ' . $totalUsers . '</p>';
                ?>
              </div>
            </button>
          </div>
          <div class="col-md-4 mb-4">
            <button class="card-img card rounded-4 bg-secondary text-black shadow-gg nav-under card-succes w-100  align-items-center" onclick="clickCate()" style="width:18rem;">
              <img src="../../images/categorias.png" class="card-img-top rounded-4" alt="...">
              <div class="card-body">
                <h5 class="card-title">Categorias</h5>
                <?php
                $sql = "SELECT * FROM categoria";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $totalCate = $stmt->rowCount();
                echo '<p class="card-text d-flex">Total de categorias cadastradas: ' . $totalCate . '</p>';
                ?>
              </div>
            </button>
          </div>
          <div class="col-md-4 mb-4">
            <button class="card bg-secondary text-black shadow-gg nav-under card-succes w-100 rounded-4 align-items-center" onclick="clickJogos()" style="width:18rem;">
              <img src="../../images/jogos.png" class="card-img-top rounded-4" alt="...">
              <div class="card-body">
                <h5 class="card-title">Jogos</h5>
                <?php
                $sql = "SELECT * FROM jogos";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $totalJogos = $stmt->rowCount();
                echo '<p class="card-text d-flex">Total de jogos cadastrados: ' . $totalJogos . '</p>';
                ?>
              </div>
            </button>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
      function clickUser() {
        window.location.href = 'users.php';
      }
      function clickCate() {
        window.location.href = 'categorias.php';
      }
      function clickJogos() {
        window.location.href = 'jogos.php';
      }
    </script>
    <script>
      $(function() {
        $('.dropdown-toggle').dropdown();
      });
    </script>