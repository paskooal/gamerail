<?php
session_start();
if(isset($_POST["submit"])){
        if(isset($_POST["username"]) && ($_POST["email"]) && ($_POST["senha"]) && ($_POST["dataNasc"])){
            require 'config.php';

        $username = $_POST["username"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $dataNasc = $_POST["dataNasc"];

        $sql = "SELECT * FROM user WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['email' => $email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row){
            $_SESSION['logError'] = "Esse E-mail já está cadastrado.";
            echo "<script>window.location.href='../cadastro.php';</script>";
            exit();
        }
        $sql = "SELECT * FROM user WHERE username = :username";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['username' => $username]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row){
            $_SESSION['logError'] = "Nome de usuário já cadastrado.";
            echo "<script>window.location.href='../cadastro.php';</script>";
            exit();
        }
        $sql = "INSERT INTO user(username,senha,email,dataNasc) VALUES (:username,:senha,:email,:dataNasc)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['username' => $username, 'senha' => $senha, 'email' => $email, 'dataNasc'=>$dataNasc]);
        $_SESSION['sucesso'] = "Log-in efetuado com sucesso!";
        echo "<script>window.location.href='../login.php';</script>";
        exit();
    }}
    ?>
