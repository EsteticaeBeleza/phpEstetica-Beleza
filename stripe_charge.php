<?php
session_start();
// Include configuration file  +
require_once 'config.php';
require 'conexao.php';
// Include Stripe PHP library 
require_once 'stripe-php/init.php';
// Set API key
\Stripe\Stripe::setApiKey('sk_test_51LhaL1ABTPsdKoxykbkRmNCqESK2G8XntGEVKKn12kTUHJZLm1ScgdsZsg1nfqbsAO259MzqcFNAtaC8tPb3j1HD00KJI1PA3V');
$response = array(
    'status' => 0,
    'error' => array(
        'message' => 'Requisição inválida!'   
    )
);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$input = file_get_contents('php://input');
	$request = json_decode($input);	
}
if (json_last_error() !== JSON_ERROR_NONE) {
	http_response_code(400);
	echo json_encode($response);
	exit;
}
//$planos-$produtos  Planos-Produtos
$produtos = $request->Produtos;
$valor= $request->Price;
//O Id do cliente será lido da Sessão
$id_cliente = $_SESSION['id_cliente'];
// Convert product price to cent
$stripeAmount = round($valor*100, 2); 
$sql = "INSERT INTO pagamento(id_cliente, Valor, Status) VALUES($id_cliente, $valor, 'aguardando')"; 
//Executa o SQL
$conn->query($sql);
$id_pedido = $conn->insert_id;
foreach($produtos as $id_produto => $quantidade) {
//foreach($planos as $plano_id => $quantidade) {
    $sql = "INSERT INTO pedido_produtos(id_pedido_produtos, id_produto, quantidade) VALUES($id_pedido_produtos, $id_produto, $quantidade)";
    //$sql = "INSERT INTO pedido_plano(ID_pedido, ID_plano, Quantidade) VALUES($id_pedido, $plano_id, $quantidade)";
    $conn->query($sql);
}
//Fecha a conexão.
$conn->close();
if(!empty($request->checkoutSession)){
    // Create new Checkout Session for the order
    try {
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'product_data' => [
                        'name' => 'Pagamento',
                        'metadata' => [
                            'pro_id' => 1
                        ]
                    ],
                    'unit_amount' => $stripeAmount,
                    'currency' => 'brl',
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => STRIPE_SUCCESS_URL.'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => STRIPE_CANCEL_URL,
            'metadata' => ['id_pedido' => $id_pedido],
        ]);
    }catch(Exception $e) { 
        $api_error = $e->getMessage(); 
    }   
    if(empty($api_error) && $session){
        $response = array(
            'status' => 1,
            'message' => 'Criação da Sessão concluida!',
            'sessionId' => $session['id']
        );
    }else{
        $response = array(
            'status' => 0,
            'error' => array(
                'message' => 'Criação da Sessão falhou! '.$api_error   
            )
        );
    }
}
// Return response
echo json_encode($response);