<?php
include_once("conexao.php");
$id = $_GET["id_produto"];
$result_produtos = "SELECT * FROM produtos WHERE id_produto=$id";
$resultado_produtos = mysqli_query($conn, $result_produtos);
$row_produtos = mysqli_fetch_assoc($resultado_produtos);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/modeloproduto.css">
    <link rel="stylesheet" href="css/modeloimagem.css">
	<link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/button.css">
    <link rel="icon" type="image/x-icon" href="imagens/favicon.png">
    
    <title><?php echo $row_produtos['nome']; ?> - Estética & Beleza</title>
</head>
<body>
      <header>        
            <a href="paginainicial.php"><img src="imagens/logoe.png" class="logo"></a>
        <ul>    
            <li><a href="paginainicial.php">Página Inicial</a></li>
            <li><a href="eventoscontrolar.html">Agendamento</a></li>
            <li><a href="seuagendamento.php">Seus Agendamentos</a></li>
            <li><a href="produtosteste.php">Produtos</a></li>
            <li><a href="teste.php">Ajuda</a></li>
            <li><a href="deslogar.php">Deslogar</a></li>
            <li><a href="carrinho.php"><ion-icon name="cart"></ion-icon></a></li>
    </header>
	
	<br></br><br></br><br></br>
	
<div class="produto">
  <h1><?php echo $row_produtos['nome']; ?></h1>
  <br><br>
  <div class="descricao"><?php echo $row_produtos['descricao']; ?></div>
  <br><br>
  <div class="valor">R$ <?php echo $row_produtos['valor']; ?></div>
  
  <button class="button"><span><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAABmJLR0QA/wD/AP+gvaeTAAABgUlEQVRIibXVP0hVYRjH8U8SpIOYjW7qINEiRBi0qoPgEDjU7ujU2NLcmEtz0CooZKMNjYGbNQniENGg+A+zLBve5+BB7j3nvefe+4OH8z6/y3m/7/Oc55wLe7gqxW/s4Lke6yaoiH+Y7TWsrNt4FbCP/QTBXamFFxjuN+yTVNXTXmw2UPHbZlwXegGq0n2poj/4q/XA5MQ+5utgu10AyrFV1Tr4ENcvuFeKmfBn2uRFvAj/sg5UjPdDjGM0YiT8kTZ5Ecvhr9Vw3MGx7tr2A0N1FV1gK9afMRlRPNz5NvkkvoX3Bud1IK7H/FFUmKNpaWqP8TbzHmPSd69J217nQgptx42bmMBc5HMt8sVY/4pDovrLUFYx5k9wgqPIj3B4I38W6/f43mFBHuusZZeY6hRCqvxnJuQML5tACr2LjbraJEezATrFEgb7CVuV/5wO8aAp6BZW8FX6+6gCHXQDIr03G1iPdZ3fWBuuT72e4SP/hS3rqkO/sSakE7dqXSsf/AcRibttYVH5NwAAAABJRU5ErkJggg=="></span></button>

</div>

<br></br>

<div class="img-zoom-container">
  <img id="myimage" width="300" height="240" <?php echo '<img src="/imagens/produtos/'.$row_produtos['imagem'].'"'; ?>>
  <div id="myresult" class="img-zoom-result"></div>
</div>
     	 
<footer>
    <div class="main-content"><!--conteúdo principal-->
          
        <div class="left box"><!--abrindo caixa da erquerda-->
            <div class="logo b">
              <img src="imagens/logob.png" alt="uepa" width=180px height=160px>
              </div>
              
              <div class="social">
                  <li><a href="#"><ion-icon name="logo-facebook"></ion-icon></a></li>
                  <li><a href="#"><ion-icon name="logo-twitter"></ion-icon></a></li>
                  <li><a href="#"><span class="instagram"></span><ion-icon name="logo-instagram"></ion-icon></a></li>
                  <li><a href="#"><span class="youtube"></span><ion-icon name="logo-youtube"></ion-icon></a></li>
              </div>
      </div><!--fechando caixa da erquerda-->
      
      <div class="right box"><!--abrindo caixa da direita-->
           <h2>Contato</h2>
           
           <div class="content">
             <div class="place">
                   <span class="icon"><ion-icon name="location-outline" href="https://www.google.com.br/maps/place/R.+Sapopemba,+1020+-+Bento+Ribeiro,+Rio+de+Janeiro+-+RJ,+21331-240/@-22.8659883,-43.3671094,17z/data=!3m1!4b1!4m5!3m4!1s0x9962fec31afaa9:0xc8370b7433e73c0e!8m2!3d-22.8659933!4d-43.3649207"></ion-icon></span>
                   <span class="text">Rua Sapopemba, 1020 - Bento Ribeiro, Rio de Janeiro - RJ</span>
               </div>
               
               <div class="phone">
                   <span class="icon"><ion-icon name="call-outline"></ion-icon></span>
                   <span class="text">+55 21 2311-1981</span>
               </div>
               
               <div class="email">
                   <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                   <span class="text">estetica.beleza1305@gmail.com</span>
               </div>
           </div>
       </div><!--fechando caixa da direita-->
       
      </div><!--conteúdo principal-->
</footer>
 
 
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="js/pesquisa.js"></script>
    <script src="js/modeloimagem.js"></script>

	</body>
</html>

</body>
</html>