<?php
session_start();

$campoemail = filter_input(INPUT_GET, 'id');
$validador = filter_input(INPUT_GET, 'validador');

//Faz a conexão com o BD.
require 'conexao.php';

//Sql que altera um registro da tabela cliente
$sql = "UPDATE cliente SET status='ativo' WHERE status='aguardando' and email='" . $campoemail . "' and validador=" . $validador;

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE) {
  echo "Registro atualizado.";
  
    //Grava alteração no log.
  include 'log.php';

} else {
  echo "Erro: " . $conn->error;
}

//Fecha a conexão.
	$conn->close();
	
?>
<!DOCTYPE  html>
<html>
    <body>
        <h1>irra seu email foi validado</h1>
    </body>
    </html>