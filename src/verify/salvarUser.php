<?php
if(isset($_POST["submit"])){
        if(isset($_POST["nomeUser"]) && ($_POST["email"]) && ($_POST["senhaUser"]) && ($_POST["dataNasc"])){
            require '../config.php';
        $nomeUser = $_POST["nomeUser"];
        $email = $_POST["email"];
        $senhaUser = $_POST["senhaUser"];
        $dataNasc = $_POST["dataNasc"];
        $sql = "INSERT INTO user(nomeUser,senhaUser,email,dataNasc) VALUES (:nomeUser,:senhaUser,:email,:dataNasc)";
        $resultado = $conn->prepare($sql);
        $resultado->bindValue("nomeUser", $nomeUser);
        $resultado->bindValue("email", $email);
        $resultado->bindValue("senhaUser", $senhaUser);
        $resultado->bindValue("dataNasc", $dataNasc);
        $resultado->execute();
        header("location: ../login.php?success=ok");
        }
    }
    ?>