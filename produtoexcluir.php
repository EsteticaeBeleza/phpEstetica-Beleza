<?php
session_start(); 

//Verifica o acesso.
require 'acessoadm.php';
 
//Faz a leitura do dado passado pelo link.
$campoid = $_GET["id"];
 
//Faz a conexão com o BD.
require 'conexao.php';

// Apagar da tabela usuários o registro com o id
$sql = "DELETE FROM produto WHERE id_produto = $campoid";

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE){

  echo "Produto Apagado!!!";
   header('Location: produtocontrolar.php?pag=1'); //Redireciona para o controle  
   exit;
}else {
  echo "Erro: " . $conn->error;
}

//Fecha a conexão.
$conn->close();

?>