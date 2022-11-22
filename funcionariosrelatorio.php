<?php
session_start();

//Verifica o acesso.
require 'acessoadm.php';

//Cria variáveis com a sessão.
$logado = $_SESSION['nome'];

//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL com limites de página ordenado por id
$sql = "SELECT * FROM funcionario ORDER BY id_f";

//Conta a quantidade total de registros por acesso
$sql1 = "SELECT count(*) as admin FROM cliente WHERE acesso='admin'";
$sql2 = "SELECT count(*) as comum FROM cliente WHERE acesso='comum'";


//Executa o SQL
$result = $conn->query($sql);
$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);

//Prepara as contagens
$row1 = $result1->fetch_assoc();
$row2 = $result2->fetch_assoc();

//Se a consulta tiver resultados
if ($result->num_rows > 0) {
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Relatório Funcionários</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/tabelanova.css">
<link rel="stylesheet" href="css/paginainicialadm.css">
<link rel="stylesheet" href="css/padrao.css">
<link rel="stylesheet" href="css/slide.css">
<link rel="stylesheet" href="css/pagination.css">
<link rel="icon" type="image/x-icon" href="imagens/favicon.png">

<script src="./js/filtrar.js"></script>

<!-- PDF I - Bibliotecas para gerar PDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.4/jspdf.plugin.autotable.min.js"></script>

<!-- PDF II - Arquivo com o código para gerar PDF -->
<script src="./js/pdf.js"></script>


</head>
<body>

<div class="topnav">
<?php
	include 'menuadm.html';
?>
</div>

<div class="content">
   <form><input type="button" value="Gerar PDF" onclick="getPDF()"></form>

			<h1>Relatório dos Funcionarios</h1>
			
			<input type="text" id="filtrarnomes" onkeyup="filtrar('filtrarnomes', 1)" placeholder="Busca de nomes">
			<input type="text" id="filtraremails" onkeyup="filtrar('filtraremails', 2)" placeholder="Busca de emails">
			
			<table id="myTable">
<tr><th>Id</th><th onclick="sortTable(1)">Nome</th><th>Email</th><th>CPF</th><th>Telefone</th><th>Função</th><th>Horário</th></tr>
				
	<?php
	  while($row = $result->fetch_assoc()) {
		echo "<tr><td>" . $row["id_f"] . "</td><td>" . $row["nome_f"] . "</td><td>" . $row["email_f"] . "</td><td>" . $row["cpf_f"] . "</td><td>". $row["telefone_f"] . "</td><td>". $row["funcao_f"] . "</td><td>" . $row["horario_f"] . "</td></tr>";
		
	  }
	?>
				
			</table>
</div>

    <br></br>
    <div class="pagination">
    <?php for($i=1; $i <= $contagem; $i++) {
            echo "<a href='clientecontrolar.php?pag=$i'>$i</a>";
    } 
	?>  

    <script type="text/javascript">
        var ctx = document.getElementById("myChart");
        var valores = [<?php echo $row1["admin"] ?>, <?php echo $row2["comum"] ?>];
        var tipos = ["admin", "comum"];

        var myChart = new Chart(ctx, {
          type: "pie",
          data: {
            labels: tipos,
            datasets: [
              {
                label: "Funcionarios",
                data: valores,
                backgroundColor: [
                  "rgba(255, 99, 132, 0.2)",
                  "rgba(54, 162, 235, 0.2)",
                  "rgba(255, 206, 86, 0.2)",
                  "rgba(75, 192, 192, 0.2)",
                  "rgba(153, 102, 255, 0.2)",
                ]
              }
            ]
          }
        }); 
    </script>   
    </div>
</body>
</html>
<?php
	//Se a consulta não tiver resultados  			
	} else {
		echo "<h1>Nenhum resultado foi encontrado.</h1>";
          echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
//Fecha a conexão.	
	$conn->close();
?> 