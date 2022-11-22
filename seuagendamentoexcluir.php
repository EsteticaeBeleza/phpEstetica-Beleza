<?php
session_start(); 

//Verifica o acesso.
require 'acessocomum.php';
 
//Faz a leitura do dado passado pelo link.
$agendamento = filter_input(INPUT_GET, 'id');
//Faz a conexão com o BD.
require 'conexao.php';

// Apagar da tabela usuários o registro com o id
$sql = "DELETE FROM agendamento WHERE id_agendamento = $agendamento";

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE) {
  echo "Usuário apagado";
  
  include 'log.php';
  
   header('Location: seuagendamento.php?id='); //Redireciona para o relatorio  
} else {
  echo "Erro: " . $conn->error;
}

//Fecha a conexão.
$conn->close();

?> 