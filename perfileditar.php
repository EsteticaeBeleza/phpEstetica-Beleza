<?php
session_start();

//Verifica o acesso.
//require 'acessoadm.php';

//Dados do formulário
$campoid = filter_input(INPUT_POST, 'id');
$camponome = filter_input(INPUT_POST, 'nome');
$campoemail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$camposenha = filter_input(INPUT_POST, 'senha');
$campocpf = filter_input(INPUT_POST, 'cpf');
$campotelefone = filter_input(INPUT_POST, 'telefone');

//Faz a conexão com o BD.
require 'conexao.php';

//Sql que altera um registro da tabela usuários
$sql = "UPDATE cliente SET nome='" . $camponome . "', email='" . $campoemail . "', senha='" . $camposenha ."',cpf='" . $campocpf . "',telefone='" . $campotelefone . "' WHERE id_cliente=" . $campoid;

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE) {
  echo "Registro atualizado.";
  
  include 'log.php';
  
} else {
    // echo "Error: " . $sql . "<br>" . $conn->error;
  echo "Erro: " . $conn->error;
}
    header('Location: paginainicial.php?pag=1');

//Fecha a conexão.
	$conn->close();
	

?> 