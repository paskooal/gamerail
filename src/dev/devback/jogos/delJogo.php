<?php
session_start();
if(isset($_POST["submit"])){
            require '../../../back/config.php';
        $id = $_POST["id"];
        $sql = "DELETE FROM user WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id'=> $id]);
        $_SESSION['delSucesso'] = 'Usuário deletado com sucesso!';
        echo "<script>window.location.href='../../users.php';</script>";
        exit();
    }
    ?>