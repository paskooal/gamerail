<?php
if (isset($_SESSION['senha']) && isset($_SESSION['email'])){
  require 'config.php';
  $email = $_SESSION["email"];
  $senha = $_SESSION["senha"];    
  $sql = "SELECT adminUnlock FROM user WHERE email = :email AND senha = :senha";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    if($resultado['adminUnlock'] == 1){
      $_SESSION['menuDev']="<li><a class='dropdown-item' href='src/dev/dashboard.php'>Menu desenvolvedor</a></li>";
    }
    else{}
}
?>