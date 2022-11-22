<?php
session_start();

//Se o usuário não usou o formulário
if (!isset($_POST['senha'])){
    header('Location: login.html'); //Redireciona para o form
    exit; // Interrompe o Script
}

// Dados do Formulário
$campoemail = filter_input(INPUT_POST, 'email');
$camposenha = filter_input(INPUT_POST, 'senha');

//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL (consulta tudo na tabela cliente com o email digitado no form)
$sql = "SELECT * FROM cliente where email='$campoemail' and status = 'ativo'";

//Executa o SQL
$result = $conn->query($sql);

// Cria uma matriz com o resultado da consulta
$row = $result->fetch_assoc(); 

	//Se a consulta tiver resultados
	if ($result->num_rows > 0) {
			
			//$verificado = password_verify($camposenha, $row["senha"]);
			//if($verificado){			

        		$_SESSION['nome'] = $row["nome"];
				$_SESSION['acesso'] = $row["acesso"];
				$_SESSION['id_cliente'] = $row["id_cliente"];
				$_SESSION['email'] = $row["email"];	

                //Verifica se o usuário logou.
                if ($_SESSION['acesso'] == "admin") {
                    header ('location: admpaginainicial.php');
                    } else if($_SESSION['acesso']!="admin"){
                            header('Location: paginainicial.php'); //Redireciona para o form
                            exit; // Interrompe o Script                    		
         //}
          } else {
             //Senha errada
			  header( "refresh:5;url=login.html" ); 
				exit;  
			}
	//Email não existe na base. 			
	} else {
		header('Location: login.html'); //Redireciona para o form
		exit; // Interrompe o Script
	}

//Fecha a conexão.
$conn->close();
?> 