<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<head>
<?php
session_start();
$campomensagem = $_POST["mensagem"];
$logado = $_SESSION['nome'];
$acesso = $_SESSION['acesso'];
$email = $_SESSION['email'];
$telefone = $_SESSION['telefone'];
//Verifica se o usuário está logado.
require 'acessocomum.php';
//Faz a conexão com o BD.
require 'conexao.php';
?>
<link href="menu.php">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/produtos.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/faq.css">
    <link rel="icon" type="image/x-icon" href="imagens/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js">
    <title>Ajuda - Estética & Beleza</title>
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
<br><br><br><br><br><br><br>
     <style>
</style>
</head>
<body>
                              <div class="container">
                                <div class="box">
                                <div class="contact_form_inner style="padding-right: 320px;">
                                    <div class="contact_field">
                                        <h3 style="font-family:century gothic">Entre em contato conosco através do formulário abaixo!</h3>
                                        <p style=>Garantimos o retorno assim que possível!</p>
                                        <form method="POST" action="contato.php">
                                       <input type="text" class="form-control form-group" placeholder="Email" value="<?php echo $_SESSION['email']; ?>"; readonly/><br><br><br>
                                        <textarea class="form-control form-group" placeholder="Envie aqui o seu contato..." name="mensagem"></textarea><br><br><br>
                                        <button class="contact_form_submit">Enviar</button></form>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col">
      <center><h2 style= font-family:"century gothic";>FAQ: Perguntas Frequentes</h2>
      <br>
<div class="layout">
<details>
  <summary>Até que horário o salão funciona?</summary>
  <br>
  <div>
  O Salão Estética & Beleza tem funcionamento a partir das 08:00 e seus trabalhos se encerram as 18:00.
  </div>
</details>
        
        </div><br>
        
        <details>
                <summary>Em quais dias da semana o salão está aberto?</summary>
                <br>
  
            <div>
            
                  Nosso salão funciona de segunda à sábado, com excessão em casos de feriados nacionais.
            
            </div>
            </details><br>

            <details>
            
                <summary>Desejo reembolso, como consigo?</summary>
                <br>
                <div>
                Entre em contato conosco através do nosso formulário ou do nosso e-mail, informando seus dados, o procedimento realizado e o motivo da solicitação de devolução.
                </div>
                </details>


        </div>
    </div>
    </div>
    </div>

        </div>
    </div>
    </div>
     </div>


  </div>

</body>

<br><br>
<footer>  
    <div class="main-content"><!--conteúdo principal-->
          
        <div class="left box"><!--abrindo caixa da erquerda-->
            <div class="logo b">
            <img src="imagens/logob.png" alt="uepa" width=180px height=160px></div>
              
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