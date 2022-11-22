<?php
require 'conexao.php';
include("conn.php");
$categoria = $_GET['categoria'];
$query = $conn->prepare("SELECT id_procedimento, nome_procedimento
 FROM procedimento
 WHERE id_categoria=:id_categoria");
$data = ['id_categoria' => $categoria];
$query->execute($data);
$registros = $query->fetchAll(PDO::FETCH_ASSOC);
echo '<option value="">Selecione o Procedimento desejado</option>';
foreach($registros as $option) {
?>
    <option value="<?php echo $option['id_procedimento']?>"><?php echo $option['nome_procedimento']?></option> 
    <?php
}