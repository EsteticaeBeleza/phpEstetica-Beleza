<?php
session_start();

//Verifica o acesso.
require 'acessoadm.php';

//Faz a leitura do dado passado pelo link.
$campoid = filter_input(INPUT_GET, 'id');

//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL (consulte tudo da tabela usuarios)
$sql = "SELECT * FROM categorias WHERE id_categoria = $campoid";

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
        <title>Editar Funcionário</title>
    </head>
    <body>
        <form action="categoriaeditar.php" method="post">
            <h3>Editar Categoria Id: <?php echo $row["id_categoria"]; ?></h3>
            <input type="hidden" name="id" value="<?php echo $row["id_categoria"]; ?>">
            <input type="text" name="nome" value="<?php echo $row["nome_categoria"]; ?>" placeholder="Novo nome..." required>		
            <input type="create" name="create" value="<?php echo $row["create"]; ?>" placeholder="Novo e-mail..." required>
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