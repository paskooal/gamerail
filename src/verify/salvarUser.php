<?php
session_start();
if(isset($_POST["submit"])){
        if(isset($_POST["nomeUser"]) && ($_POST["email"]) && ($_POST["senhaUser"]) && ($_POST["dataNasc"])){
            require 'config.php';

        $nomeUser = $_POST["nomeUser"];
        $email = $_POST["email"];
        $senhaUser = $_POST["senhaUser"];
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

        // Verifica se o nome de usuário já está cadastrado
        $sql = "SELECT * FROM user WHERE nomeUser = :nomeUser";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['nomeUser' => $nomeUser]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row){
            $_SESSION['logError'] = "Nome de usuário já cadastrado.";
            echo "<script>window.location.href='../cadastro.php';</script>";
            exit();
        }
        $sql = "INSERT INTO user(nomeUser,senhaUser,email,dataNasc) VALUES (:nomeUser,:senhaUser,:email,:dataNasc)";
        $stmt = $conn->prepare($sql);
         $stmt->execute(['nomeUser' => $nomeUser, 'senhaUser' => $senhaUser, 'email' => $email, 'dataNasc' => $dataNasc]);
        header("location: ../login.php?success=ok");
        ob_flush();
        exit();}
        }
    ?>
