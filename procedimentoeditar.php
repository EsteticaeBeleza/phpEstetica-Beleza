<?php
session_start();

//Verifica o acesso.
require 'acessoadm.php';

//Dados do formulário
$campoid = filter_input(INPUT_POST, 'id');
$campocategoria = filter_input(INPUT_POST, 'categoria');
$camponome = filter_input(INPUT_POST, 'nome');
$campotempo = filter_input(INPUT_POST, 'tempo');
$campovalor = filter_input(INPUT_POST, 'valor');


//Faz a conexão com o BD.
require 'conexao.php';

//Sql que altera um registro da tabela procedimento
$sql = "UPDATE procedimento SET id_categoria='" . $campocategoria . "', nome_procedimento='" . $camponome . "',tempo_procedimento='" . $campotempo . "',valor_procedimento='" . $campovalor . "' WHERE id_procedimento=" . $campoid;

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE) {
  echo "Registro atualizado.";
  
  include 'log.php';
  
} else {
    // echo "Error: " . $sql . "<br>" . $conn->error;
  echo "Erro: " . $conn->error;
}
    header('Location: procedimentocontrolar.php?pag=1'); //Redireciona para o form	clientecontrolar.php?pag=1

//Fecha a conexão.
	$conn->close();
	

?> 