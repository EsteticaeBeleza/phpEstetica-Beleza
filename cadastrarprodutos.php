<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/cadastrarprodutos.css">
    <link rel="icon" type="image/x-icon" href="imagens/favicon.png">
    <title>Página Inicial - Estética & Beleza</title>
</head>
<body>
    <div>
        <form method="POST" action="processa.php" enctype="multipart/form-data">
            <label>Nome: </label>
            <input type="text" name="nome" placeholder="Digite o nome do produto..."><br><br>
            <label>Imagem: </label>
            <input type="file" name="arquivo"/><br><br>
            <label>Estoque: </label>
            <input type="number_format" name="estoque" placeholder="Insira o estoque desse produto..."><br><br>
            <label>Descrição: </label>
            <input type="text" name="descricao" placeholder="Defina a descrição desse produto..."><br><br>
            <label>Valor: </label>
            <input type="number_format" name="valor" placeholder="Defina o valor do produto..."><br><br>
                <input type="submit" value="Cadastrar">
        </form>
    </div>
</body>
</html>