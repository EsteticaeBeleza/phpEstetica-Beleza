<?php
session_start();

require 'acessoadm.php';

//Dados do formulário
$campomensagem = $_POST["mensagem"];

//Faz a conexão com o BD.
require 'conexao.php';

$sql = "INSERT INTO contato(mensagem, id_cliente) VALUES('$campomensagem', " . $_SESSION['id_cliente'] . ")";

//Executa o SQL e faz tratamento de erros 
if ($conn->query($sql) === TRUE) {
   header( "refresh:5; url=paginainicial.php" );	
  echo "Recebemos seu contato e retornaremos o mais rápido possível!";

  } else {
   //header( "refresh:5; url=paginainicial.php" );
  echo "Error: " . $sql . "<br>" . $conn->error;

  }

  $conn->close();
?>