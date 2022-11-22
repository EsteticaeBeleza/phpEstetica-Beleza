
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/paginainicialadm.css">
    <link rel="stylesheet" href="css/slide.css">
    <link rel="icon" type="image/x-icon" href="imagens/favicon.png">

    <title>Página Inicial ADM - Estética & Beleza</title>
</head>
<body>
    <div class="header">
        <img src="imagens/logob.png" alt="some text" width=200px height=185px>
        <div class="deslogar">
           <ion-icon name="person-outline"></ion-icon>
           <a href="deslogar.php">Deslogar</a>
       </div>
    </div>       
    <div class="navbar">
		<a href="admpaginainicial.php">Página Inicial</a>
		<a href="clientecontrolar.php?pag=1">Usuários</a>
		<a href="agendamentocontrolar.php?pag=1">Agendamentos</a>
		<a href="produtocontrolar.php?pag=1">Produtos</a>
        <a href="categoriacontrolar.php?pag=1">Categorias</a>
		<a href="procedimentocontrolar.php?pag=1">Serviços</a>
        <a href="funcionariocontrolar.php?pag=1">Funcionários</a>
	<div class="dropdown">
		<button class="dropbtn">Relatórios<i class="fa fa-caret-down"></i></button>
    <div class="dropdown-content">
		<a href="clienterelatorio.php">Usuários</a>
        <a href="agendamentosrelatorio.php">Agendamentos</a>
        <a href="produtosrelatorio.php ">Produtos</a>
        <a href="funcionariosrelatorio.php">Funcionários</a>
    </div>
  </div>
</div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>