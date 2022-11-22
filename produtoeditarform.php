<?php
session_start();

//Verifica o acesso.
require 'acessoadm.php';

//Faz a leitura do dado passado pelo link.
$produtos = filter_input(INPUT_GET, 'id');

//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL (consulte tudo da tabela usuarios)
$sql = "SELECT * FROM produto WHERE id_produto = $produtos";

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
        <title>Editar produto</title>
    </head>
    <body>
        <form action="produtoeditar.php" method="post">

            <h3>Editar Produto: <?php echo $row["id_produto"]; ?></h3>
            <input type="hidden" name="id_produto" value="<?php echo $row["id_produto"]; ?>">
            <input type="text" name="nome_produto" value="<?php echo $row["nome_produto"]; ?>" placeholder="Novo nome..." required>	
            <input type="number" name="estoque" value="<?php echo $row["estoque"]; ?>" placeholder="Nova quantidade..." required>
            <input type="text" name="descricao" value="<?php echo $row["descricao"]; ?>" placeholder="Nova Descrição..." required>
            <input type="number" name="valor" value="<?php echo $row["valor"]; ?>" placeholder="Novo valor..." required> 
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