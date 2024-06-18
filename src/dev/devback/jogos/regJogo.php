<?php
session_start();
if(isset($_POST["submit"])){
        if(isset($_POST["nome"]) && ($_POST["dev_id"]) && ($_POST["dist_id"]) && ($_POST["categoria_id"])){
            require '../../../back/config.php';
        $nome = $_POST["nome"];
        $dev_id = $_POST["dev_id"];
        $dist_id = $_POST["dist_id"];
        $categoria_id = $_POST["categoria_id"];
        $foto = $_POST["foto"];

        $sql = "SELECT * FROM jogos WHERE nome = :nome";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['nome' => $nome]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row){
            $_SESSION['regError'] = "Esse nome já está em uso.";
            echo "<script>window.location.href='../../jogos.php';</script>";
            exit();
        }
        $sql = "INSERT INTO jogos(nome,dev_id,dist_id,categoria_id,foto) VALUES (:nome,:dev_id,:dist_id,:categoria_id,:foto)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['nome' => $nome, 'dev_id' => $dev_id, 'dist_id' => $dist_id, 'categoria_id'=>$categoria_id, 'foto'=>$foto]);
        $_SESSION['regSucesso'] = 'Jogo adicionado com sucesso!';
        echo "<script>window.location.href='../../jogos.php';</script>";
        exit();
    }}
    ?>
