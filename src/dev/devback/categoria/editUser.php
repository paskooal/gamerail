<?php
session_start();
if (isset($_POST["submit"])) {
    if (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["senha"]) && isset($_POST["dataNasc"])) {
        require '../../../back/config.php';

        $username = $_POST["username"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $dataNasc = $_POST["dataNasc"];
        $id = $_POST["id"];

        $sql = "SELECT * FROM user WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $emailBanco = $user['email'];
            $usernameBanco = $user['username'];

            if ($emailBanco !== $email) {
                $sql = "SELECT * FROM user WHERE email = :email";
                $stmt = $conn->prepare($sql);
                $stmt->execute(['email' => $email]);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($row) {
                    $_SESSION['editError'] = "Esse E-mail já está cadastrado.";
                    echo "<script>window.location.href='../../users.php';</script>";
                    exit();
                }
            }

            if ($usernameBanco !== $username) {
                $sql = "SELECT * FROM user WHERE username = :username";
                $stmt = $conn->prepare($sql);
                $stmt->execute(['username' => $username]);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($row) {
                    $_SESSION['editError'] = "Usuário já está cadastrado.";
                    echo "<script>window.location.href='../../users.php';</script>";
                    exit();
                }
            }
            $sql = "UPDATE user SET username = :username, senha = :senha, email = :email, dataNasc = :dataNasc WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['username' => $username, 'senha' => $senha, 'email' => $email, 'dataNasc' => $dataNasc, 'id' => $id]);

            $_SESSION['editSucesso'] = "Usuário editado com sucesso!";
            echo "<script>window.location.href='../../users.php';</script>";
            exit();
        }
    }
}
