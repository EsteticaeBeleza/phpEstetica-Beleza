<?php
session_start();
require 'acessocomum.php';

//Faz a conexão com o BD.
require 'conexao.php';

//Ler os valores enviados pelo formulário
$date=filter_input(INPUT_POST,'date',FILTER_DEFAULT);
$time=filter_input(INPUT_POST,'time',FILTER_DEFAULT);

//Montar o DateTime do start e do end usando os dados do form
$start = new \DateTime($date.' '.$time, new \DateTimeZone('America/Sao_Paulo'));
$end = new \DateTime($date.' '.$time, new \DateTimeZone('America/Sao_Paulo'));


$end = $end->modify('+60 minutes')->format("Y-m-d H:i:s");
$start=$start->format("Y-m-d H:i:s");

//Dados do formulário
$nome_agendamento = $_POST["nome_agendamento"];
$procedimento = $_POST["subcategoria"];

//Insere na tabela os valores dos campos
$sql = "INSERT INTO agendamento(nome_agendamento, id_procedimento, title, description, start, end, color, id_cliente) VALUES('$nome_agendamento', '$procedimento', 'agendamento', 'Evento marcado por " . $_SESSION['nome'] . "', '$start', '$end', 'blue', " . $_SESSION['id_cliente'] . ")";

//Executa o SQL e faz tratamento de erros
if ($conn->query($sql) === TRUE) {
  header( "refresh:1;url=eventoscontrolar.html" );	
  //echo "Gravado com sucesso.";

//email para validar a conta.
require 'enviaremail.php';  

//Conteúdo do email de aviso
$texto = "Seu agendamento foi marcado para " . $start;
$camponome = $_SESSION['nome'];
$campoemail = $_SESSION['email'];

enviaremail($camponome, $campoemail, 'Agendamento Marcado', $texto);

} else {
  //header( "refresh:5;url=eventoscontrolar.html" );	
  echo "Error: " . $sql . "<br>" . $conn->error;
}

//Fecha a conexão.
$conn->close();

?>