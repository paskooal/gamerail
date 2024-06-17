<nav class="navbar navbar-expand-lg bg-primary shadow-gg fs-5">
    <div class="container-fluid justify-content-center">
      <ul class="navbar-nav mb-2 mt-2 align-items-center mx-auto">
        <li class="me-3 d-flex">
          <img height="50" src="../../images/GRlogo.png" alt="">
          <p class="fs-2 m-0" style="font-family: GRfont;">GameRail</p>
        </li>
        <div class="d-lg-flex d-none d-lg-block">
          <li class="nav-item nav-border-l">
          <a class="nav-link nav-under" href="users.php">Usuários</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-under" href="categorias.php">Categorias</a>
          </li>
          <li class="nav-item  nav-border-r">
            <a class="nav-link nav-under" href="jogos.php">Jogos</a>
          </li>
          <ul class="navbar-nav d-flex flex-row ms-3 me-3 align-items-center">
            <li class="nav-item">
              <?php
            if (!isset($_SESSION['senha']) && !isset($_SESSION['email'])){
        echo "<a class='fs-5 btn btn-dark nav-under rounded-4 ms-3' href='../login.php'>Login</a>";
      }
      else{
        echo "<a class='fs-5 btn btn-dark nav-under rounded-4 ms-3' href='../back/logout.php'>Logout</a>";
      }
      ?>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navDrop" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <img src="..\..\images\matt.webp" class="rounded-circle" height="40" alt="" loading="lazy" />
              </a>
              <ul id="navDrop" class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Perfil</a></li>
                <li><a class="dropdown-item" href="#">Jogos</a></li>
                <li><a class='dropdown-item' href='../../index.php'>Loja</a></li>
              </ul>
        </div>
      </ul>
      <button class="btn btn-primary d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop"
        aria-controls="offcanvasTop"><i class="bi bi-list h1"></i></button>
    </div>
    </li>
    </ul>
    </ul>
    <div class="offcanvas offcanvas-top bg-primary d-lg-none" tabindex="-1" id="offcanvasTop"
      aria-labelledby="offcanvasTopLabel">

      <div class="offcanvas-header d-flex align-items-center">
        <div class="offcanvasTopLabel d-flex" id="offcanvasLabel">
          <img height="50" src="../../images/GRlogo.png" alt="">
          <p class="fs-2 m-0" style="font-family: GRfont;">GameRail</p>
        </div>
        <?php
        if (!isset($_SESSION['senha']) && !isset($_SESSION['email'])){
        echo "<a class='fs-5 btn btn-dark nav-under rounded-4 ms-3' href='../login.php'>Login</a>";
      }
      else{
        echo "<a class='fs-5 btn btn-dark nav-under rounded-4 ms-3' href='../back/logout.php'>Logout</a>";
      }
      ?>
        <li class="nav-link nav-item dropdown ms-3 mb-2">
              <a class="nav-link dropdown-toggle" href="#" id="navDrop" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <img src="..\..\images\matt.webp" class="rounded-circle" height="40" alt="" loading="lazy" />
              </a>
              <ul id="navDrop" class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Perfil</a></li>
                <li><a class="dropdown-item" href="#">Jogos</a></li>
                <li><a class='dropdown-item' href='..\..\index.php'>Loja</a></li>
              </ul>
            </li>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>

      <div class="offcanvas-body">
        <ul class="navbar-nav">
            </li>
          <li>
            <a class="nav-link nav-mobile mb-2 rounded-4  d-flex justify-content-center" href="users.php">Usuários</a>
          </li>
          <li>
            <a class="nav-link nav-mobile mb-2 rounded-4 d-flex justify-content-center" href="categorias.php">Categorias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-mobile mb-2 rounded-4 d-flex justify-content-center" href="jogos.php">Jogos</a>
          </li>
          </li>
      </div>
      </ul>
    </div>
    </div>
    </div>
    </div>
    </li>
    </div>
    </div>
  </nav>