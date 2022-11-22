<?php
session_start();

//Cria variáveis com a sessão.
$logado = $_SESSION['nome'];

//Verifica o acesso.
require 'acessoadm.php';

//Faz a conexão com o BD.
require 'conexao.php';

//Lê a página que será exibida
$id = $_GET["pag"];

//Quantidade de registros a serem exibidos
$total= 5;

//Indica o registro limite para paginação
if($id!=1){
    $id = $id -1;
    $id = $id * $total + 1;
}

$id--;

//Cria o SQL com limites de página ordenado por id
$sql = "SELECT * FROM funcionario ORDER BY id_f Limit $id,$total ";

//Conta a quantidade total de registros
$sql1 = "SELECT count(*) as contagem FROM funcionario";

//Executa o SQL
$result = $conn->query($sql);
$result1 = $conn->query($sql1);

//Recupera o resultado da contagem
$row1 = $result1->fetch_assoc();
$contagem = $row1["contagem"];

if($contagem%$total==0){
    $contagem=$contagem/$total;
}else{
    $contagem=$contagem/$total + 1;    
}

	//Se a consulta tiver resultados
	 if ($result->num_rows > 0) {
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Controlar Funcionários</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/tabelanova.css">
<link rel="stylesheet" href="css/paginainicialadm.css">
<link rel="stylesheet" href="css/padrao.css">
<link rel="stylesheet" href="css/slide.css">
<link rel="icon" type="image/x-icon" href="imagens/favicon.png">
</head>
<body>

<div class="topnav">
<?php
	include 'menuadm.html';
?>
</div>

<div class="content">

			<h1>Lista de Funcionarios</h1>
			<table>
<tr><th>Id</th><th>Nome</th><th>Email</th><th>Cpf</th><th>Telefone</th><th>Função</th><th>Horário</th><th colspan="2">Ações</td></tr>
				
	<?php
	  while($row = $result->fetch_assoc()) {
	      if($row["status"]=="inativo"){
	          echo "<tr style='background-color:pink'>";
	      }else{
	          echo "<tr>";
	      }
	      
	      
		echo "<td>" . $row["id_f"] . "</td><td>" . $row["nome_f"] . "</td><td>" . $row["email_f"] . "</td><td>" . $row["cpf_f"] ."</td><td>" . $row["telefone_f"] ."</td><td>" . $row["funcao_f"] . "</td><td>" . $row["horario_f"] . "</td>";
		echo "<td><a href='funcionarioeditarform.php?id=" . $row["id_f"] . "'><img src='imagens/editar.png' alt='Editar funcionario'></a></td><td><a href='funcionarioexcluir.php?id=" . $row["id_f"] . "'><img src='imagens/excluir.png' alt='Excluir funcionario'></a></td></tr>";
	  }
	?>
				
			</table>
</div>
            <a href="cadastrarfuncionario.html"><img src="imagens/incluir.png" alt="Incluir fucionario"></a>

</body>
</html>
<?php
	//Se a consulta não tiver resultados  			
	} else {
		//echo "<h1>Nenhum resultado foi encontrado.</h1>";
          echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
//Fecha a conexão.	
	$conn->close();
?> 