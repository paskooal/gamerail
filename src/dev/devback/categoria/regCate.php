<?php
session_start();

if (isset($_POST["submit"])) {
    if (isset($_POST["nome"]) && isset($_POST["foto"])) {
        $nome = $_POST["nome"];
        $foto = $_POST["foto"];

        require '../../../back/config.php';

        // Verificar se o nome da categoria já existe
        $sql = "SELECT * FROM categoria WHERE nome = :nome";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['nome' => $nome]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $_SESSION['regError'] = "<alert>Esse nome já está em uso</alert>";
            header('Location: ../../categorias.php');
            exit();
        }

        $sql = "INSERT INTO categoria (nome, foto) VALUES (:nome, :foto)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['nome' => $nome, 'foto' => $foto]);

        $_SESSION['regSucesso'] = 'Categoria adicionada com sucesso!';
        header('Location: ../../categorias.php');
        exit();
    }
}
?>