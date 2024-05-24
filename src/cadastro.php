<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="main.css">
  </head>
  <body>
    <div style="background-image: url(../images/bg.png);" class="all">
    <div class="color-overlay">
  <section class="h-100">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div  style="background-color: #42006a;"  class="card border-0 rounded-5 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">
                <div class="text-white text-center">
                  <img src="../images/GameRail.png" height="100" alt="logo">
                  <h4 style="font-family: mario;" class=" fs-1 text-white mb-2 pb-1">GAME RAIL</h4>
                </div>

                <form action="verify/salvarUser.php" method="post" class="text-white">
                  <p class="d-flex justify-content-center fs-5">Faça login em sua conta</p>
                  <div class="text-white form-floating mb-4">
                  <input type="text" name="nomeUser" class="form-control" id="floatingInput" placeholder="">
                  <label for="floatingInput">Nome de usuário</label>
                  </div>
                  <div class="text-white form-floating mb-4">
                  <input type="email" name="email" class="form-control" id="floatingInput" placeholder="">
                  <label for="floatingInput">Endereço email</label>
                  </div>
                  <div class="text-white form-floating mb-3">
                  <input type="password" name="senhaUser" class="form-control" id="floatingInput" placeholder="">
                  <label for="floatingInput">Senha</label>
                  </div>
                  <div class="text-white form-floating mb-4">
                  <input type="date" name="dataNasc" class="form-control" id="floatingInput" placeholder="">
                  <label for="floatingInput">Data de nacimento</label>
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <input class="shadow form-control btn btn-primary btn-lg active" value="Cadastre-se" name="submit" type="submit">
                      <br>
                      <div class="mt-2">
                  </div>
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Já tem uma conta?</p>
                    <a class="btn btn-outline-secondary" href="login.php">Faça Log-in</a>
                  </div>

                </form>

              </div>
            </div>
            <div class="rounded-5 col-lg-6 d-flex align-items-center gradient-custom">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <div class="d-flex justify-content-center mb-4">
                <img height="200" src="../images/coin.gif" alt="">
              </div>
                <h4 class="mb-2 fw-bold">Compre seus jogos sempre com o melhor preço</h4>
                <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                  exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>