<?php
session_start();
if(isset($_POST["submit"])){
    if(isset($_POST["email"]) && isset($_POST["senhaUser"]) && !empty($_POST["email"]) && !empty($_POST["senhaUser"]) ){
        require '../config.php';
        $email = $_POST["email"];
        $senhaUser = $_POST["senhaUser"];    
        $sql = "SELECT * FROM user WHERE email = :email AND senhaUser = :senhaUser";
        $resultado = $conn->prepare($sql);
        $resultado->bindValue(":email", $email);
        $resultado->bindValue(":senhaUser", $senhaUser);
        $resultado->execute();
        if($resultado->rowCount() > 0){
            $dados = $resultado->fetch();
            $_SESSION['senhaUser'] = $dados['senhaUser'];
            $_SESSION['email'] = $dados['email'];
            var_dump($_SESSION['email']);
            header("Location: ../index.php");
        } else {    
            echo "Credenciais inválidas!";}}}?> 