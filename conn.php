<?php
// Parâmetros para criar a conexão
$host = "sql110.epizy.com";
$user = "epiz_32123626";
$pass = "ruDMBLCIlmAI";
$db = "epiz_32123626_esteticaebelezabd";

try{
    $conn = new PDO("mysql:host=$host; dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch(Exception $e) {
        echo $e->getMessage();
        exit;
    }
?>


