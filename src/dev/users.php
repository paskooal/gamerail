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
   require 'devbar.php';
?>
  <!--site base-->
  <div class="color-overlay">
    <div class="container ps-5 pt-2 h-100 gradient-custom2 shadow-lg">
<div class="container">
  <div class="row">
    <div class="col-md-6">
    </div>
  </div>
  <div class="row mt-5">
    <div class="col-md-6">
      <h2>Usuários</h2>
      <table class="table bg-white">
        <thead>
          <tr>
            <th>ID</th>
            <th>Produto</th>
            <th>Preço</th>
            <th>Quantidade</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Camiseta</td>
            <td>$20</td>
            <td>10</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Calça Jeans</td>
            <td>$50</td>
            <td>5</td>
          </tr>
          <tr>
            <td>3</td>
            <td>Tênis</td>
            <td>$80</td>
            <td>8</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
    <script>
      $(function () {
        $('.dropdown-toggle').dropdown();
      });
    </script>