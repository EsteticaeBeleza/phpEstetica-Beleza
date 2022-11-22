<?php
	include_once("conexao.php");
	$nome=$_POST['nome'];
	$nome_imagem = $_FILES['arquivo']['name'];
	$estoque=$_POST['estoque'];
	$descricao=$_POST['descricao'];
	$valor=$_POST['valor'];
	echo "Nome do produto: $nome <br>";
	echo "Nome da Imagem do produto: $nome_imagem <br>";
	echo "Estoque do produto: $estoque <br>";
	echo "Descrição do produto: $descricao <br>";
	echo "Valor do produto: $valor <br>";	
	//Salvar no banco de dados
	$result_produto = "INSERT INTO produtos (nome, imagem, estoque, descricao, valor) VALUES ('$nome', '$nome_imagem', '$estoque', '$descricao', $valor)";
	$resultado_produto = mysqli_query($conn, $result_produto);
	$ultimo_id = mysqli_insert_id($conn);
	echo "Ultimo Id Inserido: $ultimo_id <br>";	
	//Pasta onde o arquivo vai ser salvo
			$_UP['pasta'] = 'imagens/produtos/';
			//Tamanho máximo do arquivo em Bytes
			$_UP['tamanho'] = 1024*1024*100; //5mb			
			//Array com a extensões permitidas
			$_UP['extensoes'] = array('png', 'jpg', 'jpeg');			
			//Renomeiar
			$_UP['renomeia'] = false;			
			//Array com os tipos de erros de upload do PHP
			$_UP['erros'][0] = 'Não houve erro';
			$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
			$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
			$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
			$_UP['erros'][4] = 'Não foi feito o upload do arquivo';			
			//Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
			if($_FILES['arquivo']['error'] != 0){
				die("Não foi possivel fazer o upload, erro: <br />". $_UP['erros'][$_FILES['arquivo']['error']]);
				exit; //Para a execução do script
			}			
			//Faz a verificação da extensao do arquivo
			$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
			if(array_search($extensao, $_UP['extensoes'])=== false){		
				echo
					"A imagem não foi cadastrada, extensão inválida.<br>";
			}			
			//Faz a verificação do tamanho do arquivo
			else if ($_UP['tamanho'] < $_FILES['arquivo']['size']){
				echo "Arquivo muito grande.";
			}			
			//O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta imagens
			else{
				//Primeiro verifica se deve trocar o nome do arquivo
				if($UP['renomeia'] == true){
					//Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .png
					$nome_imagem = time().'.png';
				}else{
					//mantem o nome original do arquivo
					$nome_imagem = $_FILES['arquivo']['name'];
				}
				//Verificar se é possivel mover o arquivo para a pasta escolhida
				if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta']. $nome_imagem)){
					//Upload efetuado com sucesso, exibe a mensagem
					$query = mysqli_query($conn, "INSERT INTO produtos (
					nome_imagem) VALUES('$nome_imagem')");
					echo "Imagem cadastrada com Sucesso.";
					}else{
					//Upload não efetuado com sucesso, exibe a mensagem
					echo "Imagem não foi cadastrada com Sucesso.";
				}
			}						
?>