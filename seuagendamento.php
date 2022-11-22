<?php
session_start();
//Verifica o acesso.
require 'acessocomum.php';
//Cria variáveis com a sessão.
$logado = $_SESSION['nome'];
$id = $_SESSION['id_cliente'];
$acesso = $_SESSION['acesso'];
$email = $_SESSION['email'];
$telefone = $_SESSION['telefone'];
//Faz a conexão com o BD.
require 'conexao.php';
//obg André! Me salvou aqui ;-)
$sql = "SELECT * FROM agendamento INNER JOIN procedimento ON agendamento.id_procedimento = procedimento.id_procedimentoINNER JOIN cliente ON cliente.id_cliente agendamento.id_clienteWHERE agendamento.id_cliente='$id'";
$sql1= "SELECT count(*) as comum FROM cliente WHERE acesso='comum'";
$result = $conn->query($sql);
$result1 = $conn->query($sql1);
if ($result->num_rows > 0) {
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Seus Agendamentos</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./css/tabelanova.css">
<link rel="stylesheet" href="./css/menu.css">
<link rel="stylesheet" href="./css/padrao.css">
<link rel="icon" type="image/x-icon" href="imagens/favicon.png">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js">
</head>
<body>
<section>
        <header>        
            <a href="paginainicial.php"><img src="imagens/logoe.png" class="logo"></a>
        <ul>    
            <li><a href="paginainicial.php">Principal</a></li>
            <li><a href="eventoscontrolar.html">Agendamento</a></li>
            <li><a href="seuagendamento.php">Seus Agendamentos</a></li>
            <li><a href="produtosteste.php">Produtos</a></li>
            <li><a href="teste.php">Ajuda</a></li>
            <li><a href="carrinho.php"><ion-icon name="cart"></ion-icon></a></li>
            <li><a id="myBtn"><ion-icon name="person" style="color:#8635d7"></ion-icon></a></li>
            <div id="myModal" class="modal">
  <div class="d-grid gap-2 col-6 mx-auto">
    <div class="modal-content">
        
        <div class="modal-header" style="color:#8635d7;">
            Usuário: <?php echo $logado;?>
            <br></br>
            Telefone: <?php echo $telefone;?>
            <br></br>
            E-mail: <?php echo $email;?>
        </div>
        
        <div class="modal-body">
                <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
                <a class="btn btn-outline-light" style="background-color: #8635d7;" href="perfileditarform.php?id=<?php echo $_SESSION['id_cliente'] ?>" role="button">Alterar Dados</a>
                <a class="btn btn-outline-light" style="background-color: #8635d7;" href="deslogar.php" role="button">Deslogar</a>
                </div>
        </div>
            <div class="modal-footer">
                <span class="close"><button type="button" class="btn btn-outline-light" style="background-color: #8635d7;" data-bs-dismiss="modal">Fechar</button></span>
            </div>    
    </div>
</div> 
    </header>
</section>
<br></br>
<div class="content">
			<p><h1>Agendamentos Já Marcados.</h1></p>			
			<table id="myTable">
<tr><th onclick="sortTable(1)">Seu Nome</th><th>Procedimento</th><th>Data e Hora</th><th>Término</th><th colspan="1">Ações</td></tr>			
	<?php
	  while($row = $result->fetch_assoc()) {
	      if($row["status"]=="inativo"){
	          echo "<tr style='background-color:pink'>";
	      }else{
	          echo "<tr>";
	      }
	                                                       //colocar nome do procedimento ao invés do id (feito - joao)
		echo "<tr><td>" . $row["nome"] . "</td><td>" . $row["nome_procedimento"] . "</td><td>" . $row["start"] . "</td><td>" . $row["end"] . "</td>";
		echo "<td><a href='seuagendamentoexcluir.php?id=" . $row["id_agendamento"] . "'><img src='/imagens/excluir.png' alt='Excluir Agendamento'></a></td></tr>";
	  }
	?>		
			</table>
</div>                     
    </div>
<script>
    // Get the modal
var modal = document.getElementById("myModal");
// Get the button that opens the modal
var btn = document.getElementById("myBtn");
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
<?php
	//Se a consulta não tiver resultados  			
	} else {
		//echo "<h1>Nenhum resultado foi encontrado.</h1>";
          echo "Error: " . $sql . "<br>" . $conn->error;
	}
//Fecha a conexão.	
	$conn->close();
?> 