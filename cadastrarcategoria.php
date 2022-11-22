<?php
session_start();

//Dados do formulário
$campocategoria = $_POST["nome_categoria"];

//Faz a conexão com o BD.
require 'conexao.php';

//Insere na tabela os valores do campos
$sql = "INSERT INTO categorias (nome_categoria) VALUES ('$campocategoria')";

//Executa o SQL e faz tratamento de erros
if ($conn->query($sql) === TRUE) {
  header( "refresh:5; url=admpaginainicial.php" );	
  echo "Sua categoria foi cadastrada com sucesso!!!! ";

} else {
  header( "refresh:5;url=telaerro.html" );
  echo "Error: " . $sql . "<br>" . $conn->error;
}

//Fecha a conexão.
$conn->close();

?>