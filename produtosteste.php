<?php
include_once("conexao.php");
$id = $_GET["id_produto"];
$result_produtos = "SELECT * FROM produtos";
$resultado_produtos = mysqli_query($conn, $result_produtos);
$row_produtos = $resultado_produtos;
$rows_produtos = mysqli_fetch_assoc($resultado_produtos);
$logado = $_SESSION['nome'];
$acesso = $_SESSION['acesso'];
$email = $_SESSION['email'];
$telefone = $_SESSION['telefone'];
session_start();
if (isset($_POST['add'])){
    if(isset($_SESSION['cart'])){
        print_r($_SESSION['cart']);
        $item_array_id = array_column($_SESSION['cart'], $rows_produtos['id_produto']);
        print_r($item_array_id);
      if(in_array($rows_produtos['id_produto'], $item_array_id)){
            echo "<script>alert('O Produto foi adicionado ao carrinho..!')</script>";
            echo "<script>window.location = 'produtosteste.php'</script>";
        }else{
            $count = count($_SESSION['cart']);
            $item_array = array(
                'id_produto' => $rows_produtos['id_produto']
                );
            $_SESSION['cart'][$count] = $item_array;
        }
    }else{
        $item_array = array(
                'id_produto' => $rows_produtos['id_produto']
        );
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/produtos.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/produtosteste.css">
    <link rel="stylesheet" href="css/pesquisa.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/x-icon" href="imagens/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Produtos - Estética & Beleza</title>
    <!--link da fonte-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <!--link do Bootstrap CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
        <header>        
            <?php include 'headercliente2.html';?>
        </header>
        <br></br><br></br><br></br>

    <div class="container">   
        <div class="row text-center py-5">
        	<?php
            while($rows_produtos = mysqli_fetch_assoc($resultado_produtos)){
                ?>
            <div class="col-md-3 col-sm-6 my-3 my-md-0">
                <form action="produtosteste.php" method="post">
        <div class="card shadow">
            <div><a href="detalhes.php?id_produto=<?php echo $rows_produtos['id_produto']; ?>"><?php echo '<img src="/imagens/produtos/'.$rows_produtos['imagem'].'" class="img-fluid card-img-top">';?></a>
            </div>
            <div class="card-body">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-light" name="add"><i class="fas fa-shopping-cart"></i></button>
            <input type='hidden' name='id_produto' value='<?php $rows_produtos['id_produto']; ?>'>
            </div>
            <h5 class="card-title"><?php echo $rows_produtos['nome']; ?></h5>
            <h5> <span class="price">R$<?php echo $rows_produtos['valor']; ?></span> </h5>
            <a href="detalhes.php?id_produto=<?php echo $rows_produtos['id_produto']; ?>" type="submit" class="btn btn-outline-dark" name="add">Detalhes do Produto <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-stars" viewBox="0 0 16 16">
  <path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z"/>
</svg></a>
            </div>
        </div>
    </form>
    </div>
    <?php } ?>
    </div>
    </div    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="js/pesquisa.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>