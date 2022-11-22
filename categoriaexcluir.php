<?php
session_start(); 

//Verifica o acesso.
require 'acessoadm.php';
 
//Faz a leitura do dado passado pelo link.
$campoid = filter_input(INPUT_GET, 'id');
 
//Faz a conexão com o BD.
require 'conexao.php';

//Apagar da tabela usuários o registro com o id
$sql = "DELETE FROM categorias WHERE id_categoria=$campoid";

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE) {
  echo "Categoria Apagada";
  
  include 'log.php';
  
   header('Location: categoriacontrolar.php?pag=1'); //Redireciona para o controle  
} else {
  echo "Erro: " . $conn->error;
}

//Fecha a conexão.
$conn->close();

?> 