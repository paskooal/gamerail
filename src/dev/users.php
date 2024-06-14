<?php session_start();
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
<body class="tpg bg-img2">
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
  <div class="color-overlay">
    <div class="container ps-5 pt-2 h-100 gradient-custom2 shadow-lg">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-md-6">
            <span class="fs-1 me-3">Usuários</span>
            <button type="button" class="mb-3 shadow btn btn-primary btn-lg active rounded-4 fw-bold nav-under" data-bs-toggle="modal" data-bs-target="#registrar">
              Inserir usuário
            </button>
            <?php
            if (count($users) > 0) {
              echo
              '<table class="table bg-white">
        <thead>
          <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Senha</th>
            <th>Data de nascimento</th>
            <th>Admin</th>
          </tr>
        </thead>
        <tbody>';
              foreach ($users as $user) {
                echo '<tr>
          <td>' . $user['id'] . '</td>
          <td>' . $user['username'] . '</td>
          <td>' . $user['email'] . '</td>
          <td>' . $user['senha'] . '</td>
          <td>' . $user['dataNasc'] . '</td>
          <td>' . $user['adminUnlock'] . '</td>
          <td>' .
                  '</tr>';
              }
              echo '</tbody>
      </table>
    </div>
  </div>
</div>';
            } else {
              echo 'A tabela usuários está vazia';
            }
            ?>
            <div class="modal fade" id="registrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Registrar usuário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <!--formulario-->
                    <form autocomplete="off" data-parsley-validate action="devback/regUser.php" id="regUser" method="post" class="text-white">
                      <div class="text-white form-floating mb-4">
                        <input required data-parsley-length="[4,20]" data-parsley-pattern="^\S+$" data-parsley-pattern-message="Este campo não pode conter espaços em branco." data-parsley-length-message="Este campo deve ter entre 4 á 20 digitos." type="text" name="username" class="col-6 form-control rounded-4" id="floatingInput" placeholder="">
                        <label for="floatingInput">Nome de usuário</label>
                      </div>
                      <div class="text-white form-floating mb-4">
                        <input required data-parsley-trigger="change" type="email" name="email" required data-parsley-length="[8,100]" data-parsley-pattern="^\S+$" data-parsley-pattern-message="Este campo não pode conter espaços em branco." data-parsley-length-message="Este campo deve ter entre 8 á 100 digitos." class="col-6 form-control rounded-4" id="floatingInput" placeholder="">
                        <label for="floatingInput">Endereço email</label>
                      </div>
                      <div class="text-white form-floating mb-4">
                        <input required data-parsley-length="[4,45]" data-parsley-pattern="^\S+$" data-parsley-pattern-message="Este campo não pode conter espaços em branco." data-parsley-length-message="Este campo deve ter entre 4 á 45 digitos." type="password" name="senha" class="col-6 form-control rounded-4" id="senha" placeholder="">
                        <label for="senha">Senha</label>
                      </div>
                      <div class="text-white form-floating mb-4">
                        <input required type="date" name="dataNasc" class="col-6 form-control rounded-4" id="floatingInput" placeholder="">
                        <label for="floatingInput">Data de nacimento</label>

                        <div class="">
                          <input type="checkbox" class="mt-4 ms-1" id="verSenha" onchange="exibir()">
                          <a>Ver senha</a>
                        </div>
                        <!-- era pra ter um sistema que verifica se o user tem mais de 14 anos -->
                        <?php
                        if (isset($_SESSION['logError']) && !empty($_SESSION['logError'])) {
                          echo '<p class="mt-4 loginSad">' . $_SESSION['logError'] . '</p>';
                          unset($_SESSION['logError']);
                        }

                        ?>
                      </div>
                      <div class="text-center pt-1 mb-3">
                        <input class="shadow form-control btn btn-primary btn-lg active rounded-4 fw-bold nav-under" value="Cadastre-se" name="submit" type="submit">
                        <br>
                        <div class="mt-2">
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                  </div>
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
            </script>
            <script src="../../parsley/jquery-3.4.1.min.js"></script>
            <script src="../../parsley/parsley.min.js"></script>
            <script src="../../parsley/pt-br.js"></script>