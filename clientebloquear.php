 <?php
session_start(); 

//Verifica o acesso.
require 'acessoadm.php';

//Faz a leitura do dado passado pelo link.
$campoid = $_GET["id"];
$campostatus = $_GET["status"];

//Faz a conexão com o BD.
require 'conexao.php';

if($campostatus=="ativo"){

// Bloquear usuário o registro com o id
$sql = "UPDATE cliente SET status='inativo' WHERE id_cliente=$campoid";

}else{

$sql = "UPDATE cliente SET status='ativo' WHERE id_cliente=$campoid";
}

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE) {
  echo "Cliente bloqueado";

  include 'log.php';

   header('Location: clientecontrolar.php?pag=1'); //Redireciona para o controle  
} else {
  echo "Erro: " . $conn->error;
}

//Fecha a conexão.
$conn->close();

?>