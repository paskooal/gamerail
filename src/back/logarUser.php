<?php
session_start();
if(isset($_POST["submit"])){
    if(isset($_POST["email"]) && isset($_POST["senha"]) && !empty($_POST["email"]) && !empty($_POST["senha"]) ){
        require 'config.php';
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        $sql = "SELECT username FROM user WHERE email = :email AND senha = :senha";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":senha", $senha);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['nome'] = $result['username'];
        
        $sql = "SELECT * FROM user WHERE email = :email AND senha = :senha";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":senha", $senha);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $dados = $stmt->fetch();
            $_SESSION['senha'] = $dados['senha'];
            $_SESSION['email'] = $dados['email'];
            echo "<script>window.location.href='../../index.php';</script>";                     
        } else {    
            $_SESSION['logError'] = "Credenciais inválidas!";
            echo "<script>window.location.href='../login.php';</script>"; 
         }}}
?> 