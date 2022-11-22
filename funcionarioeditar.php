<?php
session_start();

//Verifica o acesso.
require 'acessoadm.php';

//Dados do formulário
$campoid = filter_input(INPUT_POST, 'id');
$camponome = filter_input(INPUT_POST, 'nome');
$campoemail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$campocpf = filter_input(INPUT_POST, 'cpf');
$campotelefone = filter_input(INPUT_POST, 'telefone');
$campofuncao = filter_input(INPUT_POST, 'funcao');
$campohorario = filter_input(INPUT_POST, 'horario');

//Faz a conexão com o BD.
require 'conexao.php';

//Sql que altera um registro da tabela usuários
$sql = "UPDATE funcionario SET nome_f='" . $camponome . "', email_f='" . $campoemail . "',telefone_f='" . $campotelefone . "',funcao_f='" . $campofuncao ."',horario_f='" . $campohorario . "' WHERE id_f=" . $campoid;

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE) {
  echo "Registro atualizado.";
  
  include 'log.php';
  
} else {
    // echo "Error: " . $sql . "<br>" . $conn->error;
  echo "Erro: " . $conn->error;
}
    header('Location: funcionariocontrolar.php?pag=1'); //Redireciona para o form

//Fecha a conexão.
	$conn->close();
	

?> 