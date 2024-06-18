<?php session_start(); ?>
<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link rel="stylesheet" href="../parsley/parsley.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/main.css">
</head>

<body class="tpg bg-img2">
  <div class="color-overlay">
    <section class="h-100">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-xl-10 mt-5 d-flex justify-content-center align-items-center">
            <div style="background-color: #42006a;" class="card card-shadow border-0 rounded-5 text-black" style="height: 100%;">
              <div class="row">
                <div class="col-lg-6">
                  <div class="card-body p-md-5 mx-md-4">
                    <div class="text-white text-center">
                      <img src="../images/GRlogo.png" height="100" alt="logo"> <br>
                      <a href="../index.php" style="font-family: GRfont;" class="text-decoration-none fs-1 text-white mb-2 pb-1 ">GAME RAIL</a>
                    </div>
                    <form autocomplete="off" data-parsley-validate action="back/salvarUser.php" id="cadastro" method="post" class="text-white">
                      <p class="d-flex justify-content-center fs-5">Faça login em sua conta</p>
                      <div class="text-white form-floating mb-4">
                        <input required data-parsley-length="[4,20]" data-parsley-pattern="^\S+$" data-parsley-pattern-message="Este campo não pode conter espaços em branco." data-parsley-length-message="Este campo deve ter entre 4 á 20 digitos." type="text" name="username" class="col-6 form-control rounded-4" class="floatingInput" placeholder="">
                        <label for="floatingInput">Nome de usuário*</label>
                      </div>
                      <div class="text-white form-floating mb-4">
                        <input required data-parsley-trigger="change" type="email" name="email" required data-parsley-length="[8,100]" data-parsley-pattern="^\S+$" data-parsley-pattern-message="Este campo não pode conter espaços em branco." data-parsley-length-message="Este campo deve ter entre 8 á 100 digitos." class="col-6 form-control rounded-4" class="floatingInput" placeholder="">
                        <label for="floatingInput">Endereço email*</label>
                      </div>
                      <div class="text-white form-floating mb-4">
                        <input required data-parsley-length="[4,45]" data-parsley-pattern="^\S+$" data-parsley-pattern-message="Este campo não pode conter espaços em branco." data-parsley-length-message="Este campo deve ter entre 4 á 45 digitos." type="password" name="senha" class="col-6 form-control rounded-4" id="senha" placeholder="">
                        <label for="senha">Senha*</label>
                      </div>
                      <div class="text-white form-floating mb-4">
                        <input required type="date" name="dataNasc" class="col-6 form-control rounded-4" class="floatingInput" placeholder="">
                        <label for="floatingInput">Data de nacimento*</label>

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

                      <div class="d-flex align-items-center justify-content-center pb-4">
                        <p class="mb-0 me-2">Já tem uma conta?</p>
                        <a class="btn btn-outline-secondary rounded-4 fw-bold" href="login.php">Faça Log-in</a>
                      </div>

                    </form>
                  </div>
                </div>
                <div class="rounded-5 col-lg-6 d-none d-lg-flex align-items-center justify-content-center gradient-custom">
                  <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                    <div class="d-flex justify-content-center mb-4">
                      <img height="200" src="../images/spantom.gif" alt="">
                    </div>
                    <h3 style="font-family: delta;" class="mb-2 undertale">NA GAME RAIL VOCE TERÁ OS MELHORES [BIG
                      SHOT!!!]</h3>
                    <P style="font-family: delta;" class="mb-0">COMO ASSIM VOC- [ANÔNIMO PASPALHO] NÃO CRIOU SUA CONTA
                      AINDA?!!! CUSTA [0,00R$] E SÓ PRECISA ME DAR SEU [HYPERLINK BLOCKED]</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
  </div>
  </div>
  <script>
    $(function() {
      $('.dropdown-toggle').dropdown();
    });
  </script>
  <script>
    function exibir() {
      var senha = document.getElementById('senha');
      if (senha.type === "password") {
        senha.type = "text";
      } else {
        senha.type = "password";
      }
    }
  </script>
  <script>
    $('#cadastro').parsley();
  </script>
  <script src="../parsley/jquery-3.4.1.min.js"></script>
  <script src="../parsley/parsley.min.js"></script>
  <script src="../parsley/parsley.css"></script>
  <script src="../parsley/pt-br.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>