<?php
session_start();
if(isset($_POST["submit"])){
            require '../../../back/config.php';
        $id = $_POST["id"];
        $sql = "DELETE FROM categoria WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id'=> $id]);
        $_SESSION['delSucesso'] = 'Categoria deletada com sucesso!';
        echo "<script>window.location.href='../../categorias.php';</script>";
        exit();
    }
    ?>