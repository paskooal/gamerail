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
  $sql = "SELECT * FROM categoria";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
              <h3 class="d-flex">Tabela categorias</h3>
              <button type="button" class="mb-3 ms-2 shadow btn btn-secondary btn-lg active rounded-4 fw-bold nav-under d-flex text-dark" data-bs-toggle="modal" data-bs-target="#registrar">
                <i class="bi bi-plus-circle-fill me-2"></i> Inserir categoria
              </button>
              <?php
              if (count($categorias) > 0) {
                echo
                '<div class="container d-flex align-items-center">
              <div class="table-responsive-lg">
              <table class="table lg-table table-dark table-hover table-striped table-bordeless table-rounded rounded-4 align-middle">
        <thead class="table-secondary align-middle">
          <tr class="text-center">
            <th class="text-dark">ID</th>
            <th class="text-dark">Nome</th>
            <th class="text-dark">Foto</th>
            <th></th>
          </tr>
        </thead>
        <tbody>';
                foreach ($categorias as $categoria) {
                  echo '<tr>
          <td class="text-light">' . $categoria['id'] . '</td>
          <td class="text-light">' . $categoria['nome'] . '</td>
          <td class="text-light">' . $categoria['foto'] . '</td>
          <td class="d-flex">' . '<button type="button" class="mb-3 shadow btn btn-secondary text-dark btn-lg active rounded-4 fw-bold nav-under" data-bs-toggle="modal" data-bs-target="#editar' . $categoria['id'] .  '">
          <i class="bi bi-pencil-fill"></i>
        </button>' . '<div class="modal fade" id="editar' . $categoria['id'] .  '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-white">Editar categoria</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <!--formulario edit-->
              <form autocomplete="off" data-parsley-validate action="devback/categoria/regCate.php" id="regCate" method="post" class="text-white">
                  <input class="col-6 mb-5" type="file" value="' . $categoria['foto'] .'" name="foto" id="">
                  <div id="preview"></div>
                  <div class="text-white form-floating mb-2">
                  <input required data-parsley-length="[4,20]" data-parsley-pattern="^\S+$" data-parsley-pattern-message="Este campo não pode conter espaços em branco." data-parsley-length-message="Este campo deve ter entre 4 á 20 digitos." type="text" name="nome" class="col-6 form-control bg-dark rounded-4" value="' . $categoria['nome'] .'" class="floatingInput" placeholder="">
                  <label for="floatingInput" value="Texto pré-definido">Nome da categoria*</label>
                  </div>
                      <div class="text-center mt-3 pt-1">
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
            </div><button type="button" class="mb-3 ms-3 shadow btn btn-danger btn-lg active rounded-4 fw-bold nav-under" data-bs-toggle="modal" data-bs-target="#delete' . $categoria['id'] .  '">
            <i class="bi bi-trash-fill"></i>
        </button>
        <div class="modal fade" id="delete' . $categoria['id'] .  '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-white">Deletar categoria</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <h4 style="text-align: center;">Tem certeza que quer deletar essa categoria?</h4> 
            <form action="devback/categoria/delCate.php" method="post">
            <div class="d-flex mt-2">
            <input type="hidden" name="id" value="' . $categoria['id'] . ' ">
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
                echo '<h5 class="m-2">A tabela categorias está vazia</h5>';
              }
              ?>
              <div class="modal fade" id="registrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content shadow-gg">
                    <div class="modal-header text-white">
                      <h5 class="modal-title">Inserir categoria</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
              <!--formulario edit-->
              <form autocomplete="off" data-parsley-validate action="devback/categoria/regCate.php" id="regCate" method="post" class="text-white">
                  <input class="col-6 mb-5" type="file" name="foto" id="fotoInput">
                  <div class="text-white form-floating mb-2">
                  <input required data-parsley-length="[4,20]" data-parsley-pattern="^\S+$" data-parsley-pattern-message="Este campo não pode conter espaços em branco." data-parsley-length-message="Este campo deve ter entre 4 á 20 digitos." type="text" name="nome" class="col-6 form-control bg-dark rounded-4" class="floatingInput" placeholder="">
                  <label for="floatingInput" value="Texto pré-definido">Nome da categoria*</label>
                  </div>
                      <div class="text-center mt-3 pt-1">
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
                $('#regCate').parsley();
              </script>
              <script>
    // Função para atualizar a pré-visualização da imagem
    document.getElementById('fotoInput').addEventListener('change', function(event) {
        // Limpar a pré-visualização anterior, se houver
        document.getElementById('preview').innerHTML = '';

        // Obter o arquivo selecionado
        var file = event.target.files[0];

        // Verificar se o arquivo é uma imagem
        if (file && file.type.startsWith('image')) {
            var reader = new FileReader();

            reader.onload = function(e) {
                // Criar um elemento de imagem para exibir a pré-visualização
                var img = document.createElement('img');
                img.src = e.target.result;
                img.style.maxWidth = '100%'; // Ajustar o tamanho da imagem conforme necessário
                img.style.maxHeight = '200px'; // Ajustar o tamanho da imagem conforme necessário

                // Adicionar a imagem à div de pré-visualização
                document.getElementById('preview').appendChild(img);
            };

            // Ler o arquivo como URL de dados
            reader.readAsDataURL(file);
        }
    });
</script>
              <script src="../../parsley/jquery-3.4.1.min.js"></script>
              <script src="../../parsley/parsley.min.js"></script>
              <script src="../../parsley/pt-br.js"></script>