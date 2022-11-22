<?php
session_start();

//Verifica o acesso.
require 'acessoadm.php';

//Dados do formulário
$campoid = filter_input(INPUT_POST, 'id');
$camponome = filter_input(INPUT_POST, 'nome');
$campocreate = filter_input(INPUT_POST, 'create');

//Faz a conexão com o BD.
require 'conexao.php';

//Sql que altera um registro da tabela usuários
$sql = "UPDATE categoria SET nome_categoria='" . $camponome . "', create='" . $campocreate;

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE) {
  echo "Registro atualizado.";
  
  include 'log.php';
  
} else {
    // echo "Error: " . $sql . "<br>" . $conn->error;
  echo "Erro: " . $conn->error;
}
    header('Location: categoriacontrolar.php?pag=1'); //Redireciona para o form

//Fecha a conexão.
	$conn->close();
	

?> 