<?php
session_start();
if(isset($_POST["submit"])){
        if(isset($_POST["username"]) && ($_POST["email"]) && ($_POST["senha"]) && ($_POST["dataNasc"])){
            require '../../../back/config.php';

        $username = $_POST["username"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $dataNasc = $_POST["dataNasc"];

        $sql = "SELECT * FROM user WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['email' => $email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row){
            $_SESSION['regError'] = "Esse E-mail já está cadastrado.";
            echo "<script>window.location.href='../../users.php';</script>";
            exit();
        }
        $sql = "SELECT * FROM user WHERE username = :username";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['username' => $username]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row){
            $_SESSION['regError'] = "<alert>Usuário já cadastrado</alert>";
            echo "<script>window.location.href='../../users.php';</script>";
            exit();
        }
        $sql = "INSERT INTO user(username,senha,email,dataNasc) VALUES (:username,:senha,:email,:dataNasc)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['username' => $username, 'senha' => $senha, 'email' => $email, 'dataNasc'=>$dataNasc]);
        $_SESSION['regSucesso'] = 'Usuário adicionado com sucesso!';
        echo "<script>window.location.href='../../users.php';</script>";
        exit();
    }}
    ?>
