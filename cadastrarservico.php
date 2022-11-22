<?php
session_start();

//Dados do formulário
$campocategoria = $_POST["categoria"];
$campoprocedimento = $_POST["procedimento"];
$campotempo = $_POST["tempo"];
$campovalor = $_POST["valor"];

//Faz a conexão com o BD.
require 'conexao.php';

//Insere na tabela os valores do campos
$sql = "INSERT INTO procedimento (id_categoria, nome_procedimento, tempo_procedimento, valor_procedimento) VALUES ('$campocategoria', '$campoprocedimento','$campotempo','$campovalor')";

//Executa o SQL e faz tratamento de erros
if ($conn->query($sql) === TRUE) {
  header( "refresh:5; url=admpaginainicial.php" );	
  echo "Seu serviço foi cadastrado com sucesso!!!! ";

} else {
 // header( "refresh:5;url=telaerro.html" );
  echo "Error: " . $sql . "<br>" . $conn->error;
}

//Fecha a conexão.
$conn->close();
?>