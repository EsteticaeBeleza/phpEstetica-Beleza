<?php
//Verifica se o usuário logou.
if(!isset ($_SESSION['email']) || !isset ($_SESSION['acesso']))
{
  unset($_SESSION['email']);
  unset($_SESSION['acesso']);
  header('location:login.php');
  exit;
}
?>