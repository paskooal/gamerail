<a?php session_start(); require '../back/adminLock.php' ; ?>
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
                <div class="modal-dialog  ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Modal title</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <p>Modal body text goes here.</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
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