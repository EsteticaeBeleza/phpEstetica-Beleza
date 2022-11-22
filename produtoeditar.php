<?php
session_start();

//Verifica o acesso.
require 'acessoadm.php';

//Dados do formulário
$campoid = filter_input(INPUT_POST, 'id_produto');
$camponome = filter_input(INPUT_POST, 'nome_produto');
$campoestoque = filter_input(INPUT_POST, 'estoque', FILTER_VALIDATE_EMAIL);
$campodescricao = filter_input(INPUT_POST, 'descricao');
$campovalor = filter_input(INPUT_POST, 'valor');

//Faz a conexão com o BD.
require 'conexao.php';

//Sql que altera um registro da tabela usuários
$sql = "UPDATE produto SET nome_produto='" . $camponome . "', estoque='" . $campoestoque . "',descricao='" . $campodescricao . "',valor='" . $campovalor . "' WHERE id_produto=" . $campoid;

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE) {
  echo "Registro atualizado.";
  
  include 'log.php';
  
} else {
    // echo "Error: " . $sql . "<br>" . $conn->error;
  echo "Erro: " . $conn->error;
}
    header('Location: produtocontrolar.php?pag=1'); //Redireciona para o form

//Fecha a conexão.
	$conn->close();
	

?> 