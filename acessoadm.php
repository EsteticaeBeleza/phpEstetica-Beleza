<?php
//Verifica se o usuário logou.
if ($row['senha'] == "$camposenha") {
    header ('location: admpaginainicial.php');
}
	if($_SESSION['acesso']!="admin"){
		    header('location:login.html'); //Redireciona para o form
			exit; // Interrompe o Script
	}

?>