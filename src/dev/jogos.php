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
  $sql = "SELECT * FROM jogos";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $ajogos = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
              <h3 class="d-flex">Tabela jogos</h3>
              <button type="button" class="mb-3 ms-2 shadow btn btn-secondary btn-lg active rounded-4 fw-bold nav-under d-flex text-dark" data-bs-toggle="modal" data-bs-target="#registrar">
                <i class="bi bi-plus-circle-fill me-2"></i> Inserir jogo
              </button>
              <?php
              if (count($ajogos) > 0) {
                echo
                '<div class="container d-flex align-items-center">
              <div class="table-responsive-lg">
              <table class="table lg-table table-dark table-hover table-striped table-bordeless table-rounded rounded-4 align-middle">
        <thead class="table-secondary align-middle">
          <tr class="text-center">
            <th class="text-dark">ID</th>
            <th class="text-dark">Jogo</th>
            <th class="text-dark">Sobre</th>
            <th class="text-dark">Vendas</th>
            <th class="text-dark">Valor</th>
            <th class="text-dark">Desenvolvedor</th>
            <th class="text-dark">Distribuidor</th>
            <th class="text-dark">Categoria</th>
            <th class="text-dark">Foto</th>
            <th class="text-dark"></th>
          </tr>
        </thead>
        <tbody>';
                foreach ($ajogos as $jogos) {
                  echo '<tr>
          <td class="text-light">' . $jogos['id'] . '</td>
          <td class="text-light">' . $jogos['nome'] . '</td>
          <td class="text-light">' . $jogos['sobre'] . '</td>
          <td class="text-light">' . $jogos['vendas'] . '</td>
          <td class="text-light">' . $jogos['valor'] . '</td>
          <td class="text-light">' . $jogos['dev_id'] . '</td>
          <td class="text-light">' . $jogos['dist_id'] . '</td>
          <td class="text-light">' . $jogos['categoria_id'] . '</td>
          <td class="text-light">' . $jogos['foto'] . '</td>
          <td class="d-flex">' . '<button type="button" class="mb-3 shadow btn btn-secondary text-dark btn-lg active rounded-4 fw-bold nav-under" data-bs-toggle="modal" data-bs-target="#editar' . $jogos['id'] .  '">
          <i class="bi bi-pencil-fill"></i>
        </button>' . '<div class="modal fade" id="editar' . $jogos['id'] .  '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-white">Editar usuário</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <!--formulario edit-->
              <form autocomplete="off" data-parsley-validate action="devback/jogos/editJogo.php" id="regJogos" method="post" class="text-white">
                <input class="col-6 mb-3" type="file" name="foto" id="fotoInput">
                <div class="text-white form-floating mb-4">
                  <input required data-parsley-length="[2,45]" value="' . $jogos['nome']  . '" data-parsley-length-message="Este campo deve ter entre 2 á 45 digitos." type="text" name="nome" class="col-6 form-control bg-dark rounded-4" class="floatingInput" placeholder="">
                  <label for="floatingInput" value="Texto pré-definido">Nome do jogo*</label>
                </div>
                <div class="text-white form-floating mb-4">
                  <input data-parsley-trigger="change" type="text" value="' . $jogos['sobre']  . '" name="sobre" data-parsley-length="[0,500]" data-parsley-length-message="Este campo deve ter no máximo 500 digitos." class="col-6 form-control bg-dark rounded-4" class="floatingInput bg-dark" placeholder="">
                  <label for="floatingInput">Sobre</label>
                </div>
                <div class="text-white form-floating mb-4">
                  <input data-parsley-trigger="change" type="number" value="' . $jogos['valor']  . '" name="valor" data-parsley-pattern="^\S+$" data-parsley-pattern-message="Este campo não pode conter espaços em branco." data-parsley-length-message="Este campo deve ter no máximo 500 digitos." class="col-6 form-control bg-dark rounded-4 mb-3" class="floatingInput bg-dark" placeholder="">
                  <label for="floatingInput">Valor</label>
                  <div class="mb-3">
                    <label for="fk_field" class="form-label">Desenvolvedor*</label>
                    <select required data-parsley-trigger="change" value="' . $jogos['dev_id']  . '" class="form-select rounded-4" id="fk_field" name="dev_id">
                        <option selected disabled>Selecione uma opção</option><?php . 
                        $sql = "SELECT id, username FROM user";
                        $stmt = $conn->query($sql);
                        while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value=" . $user["id"] . ">" . $user["username"] . "</option>";
                        } . ?> </select>
                </div>
                <div class="mb-3">
                    <label for="fk_field" class="form-label">Distribuidor*</label>
                    <select required data-parsley-trigger="change" value="' . $jogos['dist_id']  . '" class="form-select rounded-4" id="fk_field" name="dist_id">
                        <option selected disabled>Selecione uma opção</option>
                        <?php
                        $sql = "SELECT id, username FROM user";
                        $stmt = $conn->query($sql);
                        while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value=" . $user["id"] . ">" . $user["username"] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="fk_field" class="form-label">Categoria*</label>
                    <select required data-parsley-trigger="change" value="' . $jogos['categoria_id']  . '" class="form-select rounded-4" id="fk_field" name="categoria_id">
                        <option selected disabled>Selecione uma opção</option>
                        <?php
                        $sql = "SELECT id, nome FROM categoria";
                        $stmt = $conn->query($sql);
                        while ($categoria = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value=" . $categoria["id"] . "> . $categoria["nome"] . </option>";
                        }
                        ?>
                    </select>
                </div>
                <input type="hidden" name="id" value="' . $jogos['id'] . ' ">
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
            </div><button type="button" class="mb-3 ms-3 shadow btn btn-danger btn-lg active rounded-4 fw-bold nav-under" data-bs-toggle="modal" data-bs-target="#delete' . $jogos['id'] .  '">
            <i class="bi bi-trash-fill"></i>
        </button>
        <div class="modal fade" id="delete' . $jogos['id'] .  '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <input type="hidden" name="id" value="' . $jogos['id'] . ' ">
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
                echo '<h5 class="m-2">A tabela jogos está vazia</h5>';
              }
              ?>
              <div class="modal fade" id="registrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content shadow-gg">
                    <div class="modal-header text-white">
                      <h5 class="modal-title">Inserir jogo</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
              <!--formulario edit-->
              <form autocomplete="off" data-parsley-validate action="devback/jogos/regJogo.php" id="regJogos" method="post" class="text-white">
                <input class="col-6 mb-3" type="file" name="foto" id="fotoInput">
                <div class="text-white form-floating mb-4">
                  <input required data-parsley-length="[2,45]" data-parsley-length-message="Este campo deve ter entre 2 á 45 digitos." type="text" name="nome" class="col-6 form-control bg-dark rounded-4" class="floatingInput" placeholder="">
                  <label for="floatingInput" value="Texto pré-definido">Nome do jogo*</label>
                </div>
                <div class="text-white form-floating mb-4">
                  <input data-parsley-trigger="change" type="text" name="sobre" data-parsley-length="[0,500]" data-parsley-length-message="Este campo deve ter no máximo 500 digitos." class="col-6 form-control bg-dark rounded-4" class="floatingInput bg-dark" placeholder="">
                  <label for="floatingInput">Sobre</label>
                </div>
                <div class="text-white form-floating mb-4">
                  <input data-parsley-trigger="change" type="number" name="valor" data-parsley-pattern="^\S+$" data-parsley-pattern-message="Este campo não pode conter espaços em branco." data-parsley-length-message="Este campo deve ter no máximo 500 digitos." class="col-6 form-control bg-dark rounded-4 mb-3" class="floatingInput bg-dark" placeholder="">
                  <label for="floatingInput">Valor</label>
                  <div class="mb-3">
                    <label for="fk_field" class="form-label">Desenvolvedor*</label>
                    <select required data-parsley-trigger="change" class="form-select rounded-4" id="fk_field" name="dev_id">
                        <option selected disabled>Selecione uma opção</option>
                        <?php
                        $sql = "SELECT id, username FROM user";
                        $stmt = $conn->query($sql);
                        while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option value="' . $user['id'] . '">' . $user['username'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="fk_field" class="form-label">Distribuidor*</label>
                    <select required data-parsley-trigger="change" class="form-select rounded-4" id="fk_field" name="dist_id">
                        <option selected disabled>Selecione uma opção</option>
                        <?php
                        $sql = "SELECT id, username FROM user";
                        $stmt = $conn->query($sql);
                        while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option value="' . $user['id'] . '">' . $user['username'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="fk_field" class="form-label">Categoria*</label>
                    <select required data-parsley-trigger="change" class="form-select rounded-4" id="fk_field" name="categoria_id">
                        <option selected disabled>Selecione uma opção</option>
                        <?php
                        $sql = "SELECT id, nome FROM categoria";
                        $stmt = $conn->query($sql);
                        while ($categoria = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option value="' . $categoria['id'] . '">' . $categoria['nome'] . '</option>';
                        }
                        ?>
                    </select>
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
                $(function() {
                  $('.dropdown-toggle').dropdown();
                });
                $('#regJogos').parsley();
              </script>
              <script src="../../parsley/jquery-3.4.1.min.js"></script>
              <script src="../../parsley/parsley.min.js"></script>
              <script src="../../parsley/pt-br.js"></script>