<?php
session_start();

//Verifica o acesso.
require 'acessoadm.php';

//Faz a leitura do dado passado pelo link.
$procedimentos = filter_input(INPUT_GET, 'id');

//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL (consulte tudo da tabela usuarios)
$sql = "SELECT * FROM procedimento WHERE id_procedimento = $procedimentos";

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
        <title>Editar Procedimento</title>
    </head>
    <body>
        <form action="procedimentoeditar.php" method="post">
            <h3>Editar Procedimento Id: <?php echo $row["id_procedimento"]; ?></h3>
            <input type="hidden" name="id" value="<?php echo $row["id_procedimento"]; ?>">
            <input type="number" name="categoria" value="<?php echo $row["id_categoria"]; ?>" placeholder="Nova categoria..." required>
            <input type="text" name="nome" value="<?php echo $row["nome_procedimento"]; ?>" placeholder="Novo nome..." required>
            <input type="time" name="tempo" value="<?php echo $row["tempo_procedimento"]; ?>" placeholder="Novo tempo..." required>  
            <input type="number" name="valor" value="<?php echo $row["valor_procedimento"]; ?>" placeholder="Novo valor..." required>  
            <input type="submit" value="Editar">
        </form>
    </body>
</html>
<?php
	//Se a consulta não tiver resultados  			
	} else {
		echo "<h1>Nenhum resultado foi encontrado.</h1>";
	}

	//Fecha a conexão.	
	$conn->close();
	


?> 