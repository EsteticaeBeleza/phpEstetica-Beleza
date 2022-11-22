<?php
session_start();

//Verifica o acesso.
//require 'acessoadm.php';

//Faz a leitura do dado passado pelo link.
$campoid = filter_input(INPUT_GET, 'id');

//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL (consulte tudo da tabela usuarios)
$sql = "SELECT * FROM cliente WHERE id_cliente = $campoid";

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
        <link rel="stylesheet" href="./css/form.css">
        <title>Editar perfil</title>
    </head>
    <body>
        <form action="perfileditar.php" method="post">
            <h3>Editar Perfil Id nº: <?php echo $row["id_cliente"]; ?></h3>
            <br>
            <input type="hidden" name="id" value="<?php echo $row["id_cliente"]; ?>">
            <input type="text" name="nome" value="<?php echo $row["nome"]; ?>" placeholder="Novo nome..." required>		
            <input type="email" name="email" value="<?php echo $row["email"]; ?>" placeholder="Novo e-mail..." required>
            <input type="text" name="senha" value="<?php echo $row["senha"]; ?>" placeholder="Nova senha..." required>	
            <input type="text" name="cpf" value="<?php echo $row["cpf"]; ?>" placeholder="Novo Cpf..." required>		
            <input type="text" name="telefone" value="<?php echo $row["telefone"]; ?>" placeholder="Novo Telefone..." required>	   
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