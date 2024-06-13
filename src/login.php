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
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-xl-10">
            <div style="background-color: #42006a;" class="card border-0 rounded-5 text-black">
              <div class="row g-0">
                <div class="col-lg-6">
                  <div class="card-body p-md-5 mx-md-4">
                    <div class="text-white text-center">
                      <img src="../images/GRlogo.png" height="100" alt="logo"> <br>
                      <a href="../index.php" style="font-family: GRfont;"
                        class="text-decoration-none fs-1 text-white mb-2 pb-1 ">GAME RAIL</a>
                    </div>
                    <form autocomplete="off" data-parsley-validate action="back/logarUser.php" method="post"
                      class="text-white">
                      <p class="d-flex justify-content-center fs-5">Faça login em sua conta</p>
                      <div class="text-white form-floating mb-4">
                        <input required type="email" name="email" required data-parsley-trigger="change" type="email"
                          name="email" required data-parsley-length="[8,100]" data-parsley-pattern="^\S+$"
                          data-parsley-pattern-message="*Este campo não pode conter espaços em branco."
                          data-parsley-length-message="*Este campo deve ter entre 8 á 100 digitos."
                          class="form-control rounded-4" id="floatingInput" placeholder="">
                        <label for="floatingInput">E-mail</label>
                      </div>
                      <div class="text-white form-floating mb-4">
                        <input required type="password" name="senha" required data-parsley-length="[8,45]"
                          data-parsley-pattern="^\S+$"
                          data-parsley-pattern-message="*Este campo não pode conter espaços em branco."
                          data-parsley-length-message="*Este campo deve ter entre 4 á 45 digitos."
                          class="form-control rounded-4" id="senha" placeholder="">
                        <label for="senha">Senha</label>
                        <?php
                        if (isset($_SESSION['logError']) && !empty($_SESSION['logError'])) {
                          echo '<p class="mt-4 loginSad">' . $_SESSION['logError'] . '</p>';
                          unset($_SESSION['logError']);
                        }
                        if (isset($_SESSION['sucesso']) && !empty($_SESSION['sucesso'])) {
                          echo '<p class="mt-4 loginHappy">' . $_SESSION['sucesso'] . '</p>';
                          unset($_SESSION['sucesso']);
                        }
                        ?>
                          <input type="checkbox" class="mt-4 ms-1" id="verSenha" onchange="exibir()">
                          <a>Ver senha</a>
                      </div>
                      <div class="text-center pt-1 mb-5 pb-1">
                        <input class="shadow form-control btn btn-primary btn-lg active rounded-4 fw-bold nav-under"
                          name="submit" value="Entrar" type="submit"> <br>
                      </div>


                      <div class="d-flex align-items-center justify-content-center pb-4">
                        <p class="mb-0 me-2">Não tem uma conta?</p>
                        <a class="btn btn-outline-secondary rounded-4 fw-bold" href="cadastro.php">Cadastre-se</a>
                      </div>

                    </form>

                  </div>
                </div>
                <div
                  class="rounded-5 col-lg-6 d-none d-lg-flex align-items-center justify-content-center gradient-custom">
                  <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                    <div class="d-flex justify-content-center">
                      <img height="250" src="../images/shop.webp" alt="">
                    </div>
                    <h4 class="mb-2 undertale">Desvenda, nobre visitante, a vasta panóplia de jogos virtuais na Game
                      Rail.</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
  </div>
  </div>
</body>
<script>
    function exibir() { 
        var senha = document.getElementById('senha');
        if(senha.type === "password"){
          senha.type="text";
        }
        else{
          senha.type="password";
        }
      }
  </script>
  <script>
    $('#cadastro').parsley();
  </script>
  <script src="../parsley/jquery-3.4.1.min.js"></script>
  <script src="../parsley/parsley.min.js"></script>
  <script src="../parsley/parsley.css"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

<?php
if (isset($GET_['success'])) {
  if ($GET_['success'] == 'ok') {
    echo 'Cadastro bem sucedido';
  } else {
    echo 'Cadastro falhou';
  }
}
?>
</html>