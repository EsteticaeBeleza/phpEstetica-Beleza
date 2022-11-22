<?php
// Parâmetros para criar a conexão
$servername = "sql110.epizy.com";
$username = "epiz_32123626"; 
$password = "ruDMBLCIlmAI";
$dbname = "epiz_32123626_esteticaebelezabd";

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checando a conexão
if ($conn->connect_error) {
  die("Se ferrou hehehehe: " . $conn->connect_error);
}
?>