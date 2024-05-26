<?php
session_start();
if(isset($_POST["submit"])){
    if(isset($_POST["email"]) && isset($_POST["senhaUser"]) && !empty($_POST["email"]) && !empty($_POST["senhaUser"]) ){
        require 'config.php';
        $email = $_POST["email"];
        $senhaUser = $_POST["senhaUser"];    
        $sql = "SELECT * FROM user WHERE email = :email AND senhaUser = :senhaUser";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":senhaUser", $senhaUser);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            $dados = $stmt->fetch();
            $_SESSION['senhaUser'] = $dados['senhaUser'];
            $_SESSION['email'] = $dados['email'];
            echo "<script>window.location.href='../index.php';</script>";                     
        } else {    
            $_SESSION['logError'] = "Credenciais inválidas!";
            echo "<script>window.location.href='../login.php';</script>"; 
         }}}
?> 