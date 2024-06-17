<?php
session_start();
require '../back/adminLock.php'; ?>
<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../parsley/parsley.css">
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="stylesheet" href="../../css/main.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<style>
  body.modal-open {
    overflow: hidden;
  }
</style>

<body class="tpg bg-img2"">
  <!--navbar-->
  <?php
  require 'devback/devbar.php';
  //config
  require '../back/config.php';
  $sql = "SELECT * FROM user";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
  ?>
  <!--site base-->
  <div class=" color-overlay">
  <div class="container ps-5 gradient-custom2 shadow-lg">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="row mt-5">
            <div class="col-md-6">
              <?php
              if (isset($_SESSION['regSucesso']) && !empty($_SESSION['regSucesso'])) {
                echo  '<div class="ms-2 alert alert-success" role="alert">' . $_SESSION['regSucesso'] . '</div>';
                unset($_SESSION['regSucesso']);
              }
              if (isset($_SESSION['delSucesso']) && !empty($_SESSION['delSucesso'])) {
                echo  '<div class="ms-2 alert alert-success" role="alert">' . $_SESSION['delSucesso'] . '</div>';
                unset($_SESSION['delSucesso']);
              }
              if (isset($_SESSION['editSucesso']) && !empty($_SESSION['editSucesso'])) {
                echo  '<div class="ms-2 alert alert-success" role="alert">' . $_SESSION['editSucesso'] . '</div>';
                unset($_SESSION['editSucesso']);
              }
              if (isset($_SESSION['editError']) && !empty($_SESSION['editError'])) {
                echo  '<div class="ms-2 alert alert-danger" role="alert">' . $_SESSION['editError'] . '</div>';
                unset($_SESSION['editError']);
              }
              if (isset($_SESSION['regError']) && !empty($_SESSION['regError'])) {
                echo  '<div class="ms-2 alert alert-danger" role="alert">' . $_SESSION['regError'] . '</div>';
                unset($_SESSION['regError']);
              }
              ?>
              <h3 class="d-flex">Tabela usuários</h3>
              <button type="button" class="mb-3 ms-2 shadow btn btn-secondary btn-lg active rounded-4 fw-bold nav-under d-flex text-dark" data-bs-toggle="modal" data-bs-target="#registrar">
                <i class="bi bi-plus-circle-fill me-2"></i> Inserir usuário
              </button>
              <?php
              if (count($users) > 0) {
                echo
                '<div class="container d-flex align-items-center">
              <div class="table-responsive-lg">
              <table class="table lg-table table-dark table-hover table-striped table-bordeless table-rounded rounded-4 align-middle">
        <thead class="table-secondary align-middle">
          <tr class="text-center">
            <th class="text-dark">ID</th>
            <th class="text-dark">Username</th>
            <th class="text-dark">Email</th>
            <th class="text-dark">Senha</th>
            <th class="text-dark">Data de nascimento</th>
            <th class="text-dark">Admin</th>
            <th></th>
          </tr>
        </thead>
        <tbody>';
                foreach ($users as $user) {
                  echo '<tr>
          <td class="text-light">' . $user['id'] . '</td>
          <td class="text-light">' . $user['username'] . '</td>
          <td class="text-light">' . $user['email'] . '</td>
          <td class="text-light">' . $user['senha'] . '</td>
          <td class="text-light">' . $user['dataNasc'] . '</td>
          <td class="text-light">' . $user['adminUnlock'] . '</td>
          <td class="d-flex">' . '<button type="button" class="mb-3 shadow btn btn-secondary text-dark btn-lg active rounded-4 fw-bold nav-under" data-bs-toggle="modal" data-bs-target="#editar' . $user['id'] .  '">
          <i class="bi bi-pencil-fill"></i>
        </button>' . '<div class="modal fade" id="editar' . $user['id'] .  '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-white">Editar usuário</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <!--formulario edit-->
              <form autocomplete="off" data-parsley-validate action="devback/user/editUser.php" id="regUser" method="post" class="text-white">
                <div class="text-white form-floating mb-4">
                  <input required data-parsley-length="[4,20]" data-parsley-pattern="^\S+$" data-parsley-pattern-message="Este campo não pode conter espaços em branco." data-parsley-length-message="Este campo deve ter entre 4 á 20 digitos." type="text" name="username" class="col-6 form-control bg-dark rounded-4" class="floatingInput" value="' . $user['username'] . '" placeholder="">
                  <label for="floatingInput" value="Texto pré-definido">Nome de usuário*</label>
                </div>
                <div class="text-white form-floating mb-4">
                  <input required data-parsley-trigger="change" type="email" name="email" required data-parsley-length="[8,100]" data-parsley-pattern="^\S+$" data-parsley-pattern-message="Este campo não pode conter espaços em branco." data-parsley-length-message="Este campo deve ter entre 8 á 100 digitos." class="col-6 form-control bg-dark rounded-4" class="floatingInput bg-dark" value="' . $user['email'] . '" placeholder="">
                  <label for="floatingInput">Endereço email*</label>
                </div>
                <div class="text-white form-floating mb-4">
                        <input required data-parsley-length="[4,45]" data-parsley-pattern="^\S+$" data-parsley-pattern-message="Este campo não pode conter espaços em branco." data-parsley-length-message="Este campo deve ter entre 4 á 45 digitos." type="password" name="senha" class="col-6 form-control bg-dark rounded-4" id="senhaEdit" value="' . $user['senha'] . '" placeholder="">
                        <label for="senha">Senha*</label>
                      </div>
                <div class="text-white form-floating mb-4">
                  <input required type="date" name="dataNasc" class="col-6 form-control bg-dark rounded-4" class="floatingInput" value="' . $user['dataNasc'] . '" placeholder="">
                  <label for="floatingInput">Data de nacimento*</label>
                <input type="hidden" name="id" value="' . $user['id'] . ' ">
                  <div class="">
                    <input type="checkbox" class="mt-4 ms-1" id="verSenha" onchange="ver()">
                    <a>Ver senha</a>
                  </div>
                  <script>
                function ver() {
                  var senhaEdit = document.getElementById("senhaEdit");
                  if (senhaEdit.type === "password") {
                    senhaEdit.type = "text";
                  } else {
                    senhaEdit.type = "password";
                  }
                }
                </script>
                  </div>
                      <div class="text-center pt-1 mb-3">
                        <input class="shadow form-control btn btn-primary btn-lg active rounded-4 fw-bold nav-under" value="Editar" name="submit" type="submit">
                        <br>
                        <div class="mt-2">
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                  </div>
                </div>
              </div>
            </div><button type="button" class="mb-3 ms-3 shadow btn btn-danger btn-lg active rounded-4 fw-bold nav-under" data-bs-toggle="modal" data-bs-target="#delete' . $user['id'] .  '">
            <i class="bi bi-trash-fill"></i>
        </button>
        <div class="modal fade" id="delete' . $user['id'] .  '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-white">Deletar usuário</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <h4 style="text-align: center;">Tem certeza que quer deletar esse usuário?</h4> 
            <form action="devback/user/delUser.php" method="post">
            <div class="d-flex mt-2">
            <input type="hidden" name="id" value="' . $user['id'] . ' ">
            <input class="me-3 shadow form-control btn btn-success btn-lg active rounded-4 fw-bold nav-under" value="Sim" name="submit" type="submit">
            <button type="button" class="shadow form-control btn btn-danger btn-lg active rounded-4 fw-bold nav-under" data-bs-dismiss="modal" aria-label="Close">Não</button>
                  </div>
                  </form>
                  </div>
                  <div class="modal-footer">
                  </div>
                </div>
              </div>
        </tr>';
                }
                echo '</tbody>
      </table>
      </div>
    </div>
    </div>
  </div>
</div>';
              } else {
                echo '<h5 class="m-2">A tabela usuários está vazia</h5>';
              }
              ?>
              <div class="modal fade" id="registrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content shadow-gg">
                    <div class="modal-header text-white">
                      <h5 class="modal-title">Inserir usuário</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
              <!--formulario edit-->
              <form autocomplete="off" data-parsley-validate action="devback/user/regUser.php" id="regUser" method="post" class="text-white">
                <div class="text-white form-floating mb-4">
                  <input required data-parsley-length="[4,20]" data-parsley-pattern="^\S+$" data-parsley-pattern-message="Este campo não pode conter espaços em branco." data-parsley-length-message="Este campo deve ter entre 4 á 20 digitos." type="text" name="username" class="col-6 form-control bg-dark rounded-4" class="floatingInput" placeholder="">
                  <label for="floatingInput" value="Texto pré-definido">Nome de usuário*</label>
                </div>
                <div class="text-white form-floating mb-4">
                  <input required data-parsley-trigger="change" type="email" name="email" required data-parsley-length="[8,100]" data-parsley-pattern="^\S+$" data-parsley-pattern-message="Este campo não pode conter espaços em branco." data-parsley-length-message="Este campo deve ter entre 8 á 100 digitos." class="col-6 form-control bg-dark rounded-4" class="floatingInput bg-dark" placeholder="">
                  <label for="floatingInput">Endereço email*</label>
                </div>
                <div class="text-white form-floating mb-4">
                        <input required data-parsley-length="[4,45]" data-parsley-pattern="^\S+$" data-parsley-pattern-message="Este campo não pode conter espaços em branco." data-parsley-length-message="Este campo deve ter entre 4 á 45 digitos." type="password" name="senha" class="col-6 form-control bg-dark rounded-4" id="senha" placeholder="">
                        <label for="senha2">Senha*</label>
                      </div>
                <div class="text-white form-floating mb-4">
                  <input required type="date" name="dataNasc" class="col-6 form-control bg-dark rounded-4" class="floatingInput" value="' . $user['dataNasc'] . '" placeholder="">
                  <label for="floatingInput">Data de nacimento*</label>
                <input type="hidden" name="id">
                  <div class="">
                    <input type="checkbox" class="mt-4 ms-1" id="verSenha" onchange="exibir()">
                    <a>Ver senha</a>
                  </div>
                  </div>
                      <div class="text-center pt-1 mb-3">
                        <input class="shadow form-control btn btn-primary btn-lg active rounded-4 fw-bold nav-under" value="Inserir" name="submit" type="submit">
                        <br>
                        <div class="mt-2">
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                  </div>
                </div>
              </div>
              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
              <script>
                 function exibir() {
                  var senha = document.getElementById('senha');
                  if (senha.type === "password") {
                    senha.type = "text";
                  } else {
                    senha.type = "password";
                  }
                }
                $(function() {
                  $('.dropdown-toggle').dropdown();
                });
                $('#regUser').parsley();
              </script>
              <script src="../../parsley/jquery-3.4.1.min.js"></script>
              <script src="../../parsley/parsley.min.js"></script>
              <script src="../../parsley/pt-br.js"></script>