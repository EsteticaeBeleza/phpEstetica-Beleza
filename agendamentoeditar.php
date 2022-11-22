<?php
session_start();

//Verifica o acesso.
require 'acessoadm.php';

//Dados do formulário
$campoid = filter_input(INPUT_POST, 'id_agendamento');
$camponome = filter_input(INPUT_POST, 'nome_agendamento');
$campostart = filter_input(INPUT_POST, 'start');
$campoend = filter_input(INPUT_POST, 'end');

//Faz a conexão com o BD.
require 'conexao.php';

//Sql que altera um registro da tabela usuários
$sql = "UPDATE agendamento SET nome_agendamento='" . $camponome . "', start='" . $campostart . "',end='" . $campoend ."' WHERE id_agendamento=" . $campoid;

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE) {
  echo "Registro atualizado.";
  
  include 'log.php';
  
} else {
  echo "Erro: " . $conn->error;
}
    header('Location: agendamentocontrolar.php?pag=1'); //Redireciona para o form

//Fecha a conexão.
	$conn->close();
?> 