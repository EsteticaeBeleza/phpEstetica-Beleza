<!DOCTYPE html>
<html>
<head>
<title>Form Agendamento</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="/css/form.css">
<link rel="icon" type="image/x-icon" href="/imagens/favicon.png">
</head>
<body>

<?php
session_start();
//Verifica se o usuário está logado.
require 'acessocomum.php';

//Faz a conexão com o BD.
require 'conexao.php';
include("conn.php");

//Lê a data e hora clicadas pelo usuário.
$date=new \DateTime($_GET['date'],new \DateTimeZone('America/Sao_Paulo'));
?>

<form name="formAdd" id="formAdd" method="post" action="eventocadastrarcodigo.php">

    Cliente:
    <input type="text" name="nome_agendamento" id="nome_agendamento" placeholder="Insira o nome do cliente que será atendido..."; required>

    Email Cadastrado:
    <input type="email" name="email" id="title" value="<?php echo $_SESSION['email']; ?>"; readonly>

    Categoria:
    <select name="categoria" id="categoria" required>
        <option value="">Selecione uma categoria</option>
        <?php
        $query = $conn->query("SELECT id_categoria, nome_categoria FROM categorias");
        $registros = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach($registros as $option) {
        ?>
            <option value="<?php echo $option['id_categoria']?>">
            <?php echo $option['nome_categoria']?>
            </option> 
        <?php
        }
        ?>

       </select>

    Procedimento:
			<select name="subcategoria" id="subcategoria" required>
				<option value="">Selecione o Procedimento desejado</option>
			</select>
            
            <br><br>

    Data:
    <input type="date" name="date" id="date" value="<?php echo $date->format("Y-m-d") ?>"; readonly>

    Hora:
    <input type="time" name="time" id="time" value="<?php echo $date->format("H:i") ?>"; readonly>
    <br></br>

    <input type="submit" value="Realizar Agendamento">
</form>

<script src="js/funcoes.js"></script>
		
</body>
</html>
