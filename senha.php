<?php
  //Este é o cadastro do usuário ou mudança de senha
  
  // Senha lida do formulário
  $text = $_POST["senha"];
$hash = password_hash($text, PASSWORD_BCRYPT);

  include 'conexao.php';

 $sql = "INSERT INTO usuarios(nome, email, senha, cpf, telefone) VALUES('', 'z', '$hash', '', '')";

if ($conn->query($sql) === TRUE) {
//echo "Gravado com sucesso.";
} 
 ?>
 <?php
  $sql = "SELECT * FROM usuarios where email='z'";
//Executa o SQL
$result = $conn->query($sql)
// Cria uma matriz com o resultado da consulta
 $row = $result->fetch_assoc(); 
    // Verifica se o hash lido do bd corresponde a senha digitada no form
  $resultado = password_verify($text, $row["senha"]);
  echo $hash;
  echo "<br>" . $row["senha"]; 
  if ($hash == $row["senha"]) {
      echo '<br><br>Senha Ok!';
  } else {
      echo '<br><br>Senha Errada!';
  }  
?>