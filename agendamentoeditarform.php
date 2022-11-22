<?php
session_start();

//Verifica o acesso.
require 'acessoadm.php';

//Faz a leitura do dado passado pelo link.
$campoid = filter_input(INPUT_GET, 'id');

//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL (consulte tudo da tabela usuarios)
$sql = "SELECT * FROM agendamento WHERE id_agendamento = $campoid";

//Executa o SQL
$result = $conn->query($sql);

	//Se a consulta tiver resultados
	 if ($result->num_rows > 0) {

// Cria uma matriz com o resultado da consulta
 $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="./css/estilo.css">
        <title>Editar Agendamento</title>
    </head>
    <body>
        <form action="agendamentoeditar.php" method="post">
            <h3>Editar Agendamento Id: <?php echo $row["id_agendamento"]; ?></h3>
            <br>
            <input type="hidden" name="id" value="<?php echo $row["id_agendamento"]; ?>">
            <input type="text" name="nome" value="<?php echo $row["nome_agendamento"]; ?>" placeholder="Novo nome..." required>		
            <input type="start" name="start" value="<?php echo $row["start"]; ?>" placeholder="Novo início..." required>		
            <input type="end" name="end" value="<?php echo $row["end"]; ?>" placeholder="Novo término..." required>

            <input type="submit" value="Editar">
        </form>
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