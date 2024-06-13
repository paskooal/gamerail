<?php
$host = 'localhost';
$user = 'root';
$pass = '';
try{
    $conn = new PDO("mysql:host=$host;dbname=gamerail" . $pass,$user);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     error_log("Conexão bem sucedida");
    }catch(PDOException $erro) {
      error_log("Conexão Falhou: " . $erro->getMessage()); 
    }
    ?>

