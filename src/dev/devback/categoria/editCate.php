<?php
session_start();
if (isset($_POST["submit"])) {
    if (isset($_POST["nome"]) && isset($_POST["foto"])) {
        require '../../../back/config.php';

        $nome = $_POST["nome"];
        $foto = $_POST["foto"];
        $id = $_POST["id"];

        $sql = "SELECT * FROM categoria WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $categoria = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($categoria) {
            $nomeBanco = $categoria['nome'];

            if ($nomeBanco !== $nome) {
                $sql = "SELECT * FROM categoria WHERE nome = :nome";
                $stmt = $conn->prepare($sql);
                $stmt->execute(['nome' => $nome]);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($row) {
                    $_SESSION['editError'] = "Esse nome de categoria já está em uso.";
                    echo "<script>window.location.href='../../categorias.php';</script>";
                    exit();
                }
            }
            $sql = "UPDATE categoria SET nome = :nome, foto = :foto WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['nome' => $nome, 'foto' => $foto, 'id' => $id]);

            $_SESSION['editSucesso'] = "Categoria editada com sucesso!";
            echo "<script>window.location.href='../../categorias.php';</script>";
            exit();
        }
    }
}
