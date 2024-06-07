<?php
//conexão
$host = 'localhost';
$user = 'root';
$pass = '';
try{
    $conn = new PDO("mysql:host=$host;dbname=gamerail" . $pass,$user);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     echo "Conexão Bem Sucedida";
    }catch(PDOException $erro) {
      echo "Conexão Falhou: " . $erro->getMessage();
    }

