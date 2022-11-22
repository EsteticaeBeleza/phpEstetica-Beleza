<?php

//Faz a conexão com o BD.
require 'conexao.php';

 $con = mysqli_connect($servername, $username, $password);

    //obter produto do BD
    function getData(){
        $sql = "SELECT * FROM produtos";

        $result = mysqli_query($con, $sql);

        if(mysqli_num_rows($result) > 0){
            return $result ;
        }
    }

    //acho que esse arquivo no final não vai servir para nada