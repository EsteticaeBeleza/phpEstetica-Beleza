<?php
session_start();

require 'conexao.php';

if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["product_id"] == $_GET['id_produto']){
              unset($_SESSION['cart'][$key]);
              echo "<script>alert('O Produto Foi Removido...!')</script>";
              echo "<script>window.location = 'carrinho.php'</script>";
      }  }  }  }
//novos testes para a realização do carrinho
//$produtos_no_carrinho = isset($_SESSION['carrinho']) ? $_SESSION['carrinho'] : array();
//$produtos_para_pesquisar = " "; //barra de pesquisa??

//foreach($produtos_no_carrinho as $produto) {
 //   $auxiliar = $produtos_para_pesquisar;
  //  $produtos_para_pesquisar = $produto . ", " . $auxiliar;
  //  }

$key = "pk_test_51LhaL1ABTPsdKoxys9P5kPnUh5SKcyfdgVV64j1NaGdPWOY713D7GyEjdVm84Etye9GhM4e7TAwX2ALc4DyZEBsq008rZWaYR6"

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/carrinho.css"> <!--criar esse arquivo-->
    <title>Carrinho - Estética & Beleza</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css">

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="css/produtosteste.css">
</head>
<body class="bg-light">

<?php
    require_once ('php/header.php');
?>

<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h6>Meu Carrinho</h6>
                <hr>

           <!-- <tr>
                <td colspan="2">Produto</td>
                <td>Preço unitário</td>
                <td>Quantidade</td>
                <td>Total</td>
            </tr> -->

                <?php
                //$sql = "SELECT * FROM produtos WHERE id IN (" . $produtos_para_pesquisar . "0 )";
               // $result = $conn->query($sql);
                //if ($result->num_rows > 0) {
                //    while($row = $result->fetch_assoc())   {
                   //     echo '<tr class="produto-adicionado" data-preco="' . $row["preco_venda"] . '" '



                  //  }





              //  }



                $total = 0; 
                    if (isset($_SESSION['cart'])){
                        $product_id = array_column($_SESSION['cart'], $_GET['id_produto']);
       
                    while ($row = $result->mysqli_fetch_assoc()){
                            foreach ($product_id as $id){
                               if ($row['id_produto'] == $id){
                                    cartElement($row['imagem'], $row['nome'], $row['valor'], $row['id_produto']);
                                    $total = $total + (int)$row['valor'];
                                }
                            }
                        }
                    }else{
                        echo "<h5>Seu Carrinho Está Vazio</h5>";
                    }
                ?>

            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

            <div class="pt-4">
                <h6>DETALHES DO PREÇO</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                            if (isset($_SESSION['cart'])){
                                $count  = count($_SESSION['cart']);
                                echo "<h6>Preço ($count itens)</h6>";
                            }else{
                                echo "<h6>Preço (0 itens)</h6>";
                            }
                        ?>
                        <h6>Taxas de entrega</h6>
                        <hr>
                        <h6>Preço Final</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>R$<?php echo $total; ?></h6>
                        <h6 class="text-success">GRATUITO</h6>
                        <hr>
                        <h6>R$<?php echo $total; ?></h6>
                        
  <button class="btn btn-outline-success" type="button"> Realizar Pagamento <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
  <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
  <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/>
</svg></button>

<br></br>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
