<?php
session_start();

//Dados do formulário
$camponome = $_POST["nome"];
$campoemail = $_POST["email"];
$camposenha = password_hash($_POST["senha"], PASSWORD_BCRYPT);
$campocpf = $_POST["cpf"];
$campotelefone = $_POST["telefone"];
$campoacesso = $_POST["acesso"];

//Faz a conexão com o BD.
require 'conexao.php';

//Cria um número inteiro aleatório dentro do intervalo
$validador = rand(10000000,99999999);

//Verifica email duplicado e retorna erro.
$sql = "select * from cliente where email='$campoemail'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	header("Location: cadastrarcliente.html?erro=2");
	exit;	
}

session_start();
if(isset($_GET["erro"])){
		if ($_GET["erro"]==1){
			echo "<h2>Caracter Proibido</h2>";
		}
		if ($_GET["erro"]==2){
			echo "<h2>Email já cadastrado</h2>";
		}
		
	}

//Insere na tabela os valores dos campos
$sql = "INSERT INTO cliente (nome, email, senha, cpf, telefone, acesso, status, validador) VALUES ('$camponome','$campoemail','$camposenha','$campocpf','$campotelefone', 'comum', 'aguardando', '$validador')";

//Executa o SQL e faz tratamento de erros 
if ($conn->query($sql) === TRUE) {
   header( "refresh:1; url=login.html" );	
  //echo "Seu cadastro foi gravado com sucesso!!!! ";

  //Envie email para validar a conta.
  require 'enviaremail.php'; 

  } else {
   header( "refresh:5;url=telaerro.html" );
 // echo "Error: " . $sql . "<br>" . $conn->error;
}

//Conteúdo do email de validação
$assunto = "Validar conta";
$texto = "Clique <a href='http://esteticaebeleza.42web.io/usuariovalidaremail.php?id=" . $campoemail . "&validador=" . $validador . "'>aqui</a>.";

enviaremail($camponome, $campoemail, $assunto, $texto);

//Fecha a conexão.
$conn->close();

?>