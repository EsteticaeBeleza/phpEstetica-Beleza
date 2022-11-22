<?php
session_start();

//Dados do formulário
$camponome = $_POST["nome"];
$campoemail = $_POST["email"];
$campocpf = $_POST["cpf"];
$campotelefone = $_POST["telefone"];
$campofuncao = $_POST["funcao"];
$campohorario = $_POST["horario"];

//Faz a conexão com o BD.
require 'conexao.php';

//Insere na tabela os valores do campos
$sql = "INSERT INTO funcionario (nome_f, email_f, cpf_f, telefone_f, funcao_f, horario_f) VALUES ('$camponome','$campoemail','$campocpf','$campotelefone',' $campofuncao','$campohorario')";

//Executa o SQL e faz tratamento de erros
if ($conn->query($sql) === TRUE) {
  header( "refresh:5; url=admpaginainicial.html" );	
  echo "O cadastro do seu funcionário foi gravado com sucesso!!!! ";

} else {
  header( "refresh:5;url=telaerro.html" );
  echo "Error: " . $sql . "<br>" . $conn->error;
}

//Fecha a conexão.
$conn->close();

?>