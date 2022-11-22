<?php
session_start();
require 'acessocomum.php';
//Cria variáveis com a sessão.
$id = $_SESSION['id_cliente'];
$logado = $_SESSION['nome'];
$acesso = $_SESSION['acesso'];
$email = $_SESSION['email'];
$telefone = $_SESSION['telefone'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/paginainicial.css">
    <link rel="stylesheet" href="/css/slide.css">
    <link rel="icon" type="image/x-icon" href="imagens/favicon.png">
    <title>Página Inicial - Estética & Beleza</title>
</head>
<body>
    <section>
        <header>
        <?php include 'headercliente.html';?>
        </header>
    <div class="content">
        <div class="textBox">
        <h2>Bem vindo ao Estética & Beleza!<br>No <span> site: </span></h2>
        <p>Você pode realizar agendamentos, ver nossos trabalhos e comprar produtos originais
         do nosso estabelecimento. Evitando estresse, espera e fazendo com que você cuide de si sem se preocupações.</p>
        <a href="servicos.html">Veja os Serviços</a>
    </div>
        <div class="imgBox">
            <img src="imagens/img1.png" class="salao">
        </div>
    </div>  
    <ul class="thumb">
        <li><img src="imagens/thumb1.png"  onclick="imgSlider('imagens/img1.png')" ></li>
        <li><img src="imagens/thumb2.png" onclick="imgSlider('imagens/img2.png')"></li>
        <li><img src="imagens/thumb3.png" onclick="imgSlider('imagens/img3.png')"></li>
        <li><img src="imagens/thumb4.png" onclick="imgSlider('imagens/img4.png')"></li>
    </ul>
    <ul class="sci">
        <li><a href="#"><img src="imagens/facebook.png"></a></li>
        <li><a href="#"><img src="imagens/instagram.png"></a></li>
        <li><a href="#"><img src="imagens/twitter.png"></a></li>
        <li><a href="#"><img src="imagens/youtube.png"></a></li>
    </ul>
</section>
<script type="text/javascript">
    function imgSlider(anything){
        document.querySelector('.salao').src = anything;
    }
    </script>
</body>
</html>