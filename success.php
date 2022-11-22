<?php
session_start();
// Include configuration file 
require_once 'conexao.php';
    $session_id = $_GET['session_id'];
        // Include Stripe PHP library 
        require_once 'stripe-php/init.php';       
        // Set API key
        \Stripe\Stripe::setApiKey('sk_test_51LhaL1ABTPsdKoxykbkRmNCqESK2G8XntGEVKKn12kTUHJZLm1ScgdsZsg1nfqbsAO259MzqcFNAtaC8tPb3j1HD00KJI1PA3V');        
        // Fetch the Checkout Session to display the JSON result on the success page
        try {
            $checkout_session = \Stripe\Checkout\Session::retrieve($session_id);
        }catch(Exception $e) { 
            $api_error = $e->getMessage(); 
        }
        echo "<hr>" . $checkout_session;
// Retrieves the details of customer
            try {
                // Create the PaymentIntent
                $customer = \Stripe\Customer::retrieve($checkout_session->customer);
            } catch (\Stripe\Exception\ApiErrorException $e) {
                $api_error = $e->getMessage();
            }
echo "<hr>" . $customer;      
            // Retrieve the details of a PaymentIntent
            try {
                $intent = \Stripe\PaymentIntent::retrieve($checkout_session->payment_intent);
            } catch (\Stripe\Exception\ApiErrorException $e) {
                $api_error = $e->getMessage();
            }
echo "<hr>" . $intent;
echo "<hr>";
$id_pedido = $checkout_session->metadata->id_pedido;
$valor = $checkout_session->amount_total;
echo "<hr>";
//Sql que altera um registro da tabela usuários
$sql = "UPDATE pagamento SET Status='Pago' WHERE ID_pedido=" . $id_pedido; 
//Executa o SQL e faz tratamento de erros
if ($conn->query($sql) === TRUE) {
  echo "Gravado com sucesso.";
} else { 
  echo "Error: " . $sql . "<br>" . $conn->error;
}
//Fecha a conexão.
$conn->close();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<title>Pagamento</title>
<meta charset="utf-8">
<!-- Stylesheet file -->
<link href="css/style.css" rel="stylesheet">
</head>
<body class="App">
	<h1></h1>
	<div class="wrapper">	
	</div>
</body>
</html>