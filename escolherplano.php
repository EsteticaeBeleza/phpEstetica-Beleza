<?php
// Conexão com o BD  
require_once 'conexao.php'; 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Selecione o seu produto</title>
<meta charset="utf-8">
<!-- Stripe JavaScript library -->
<script src="https://js.stripe.com/v3/"></script>
</head>
<body class="App">
    <h1>Pagamento</h1>
    <div class="wrapper">
        <!-- Display errors returned by checkout session -->
        <div id="paymentResponse">
        <?php 
            $results = mysqli_query($conn,"SELECT * FROM produtos WHERE id_produto=1");
            $row = mysqli_fetch_array($results,MYSQLI_ASSOC);
            $produto1 = $row['valor'];
        ?>
            <div class="col__box">
              <h5><?php echo $produto1 ?></h5>
                <h6>Preço: <span> R$<?php echo $row['valor'] ?> </span> </h6>
            
                <!-- Buy button -->
                <div id="buynow">
                    <button class="btn__default" id="payButton"> Adicionar </button>
                </div>
            </div>
            
            <?php 
                $results2 = mysqli_query($conn,"SELECT * FROM plano WHERE ID_plano=2");
                //$row2 = mysqli_fetch_array($results2,MYSQLI_ASSOC);
                $plano2 = $row2['valor'];                
            ?>
            <div class="col__box">
                <h5><?php echo $plano2 ?></h5>
                    <h6>Preço: <span> R$<?php echo $row2['valor'] ?> </span> </h6>
            
                    <!-- Buy button -->
                    <div id="buynow">
                        <button class="btn__default" id="payButton2"> Adicionar </button>
                    </div>
            </div>

            <?php 
                $results3 = mysqli_query($conn,"SELECT * FROM plano WHERE ID_plano=3");
                //$row3 = mysqli_fetch_array($results3,MYSQLI_ASSOC);
                $plano3 = $row3['valor'];                
            ?>
            <div class="col__box">
              <h5><?php echo $plano3 ?></h5>
                <h6>Preço: <span>R$<?php echo $row3['valor'] ?> </span> </h6>
            
                <!-- Buy button -->
                <div id="buynow">
                    <button class="btn__default" id="payButton3"> Adicionar </button>
                </div>
            </div>
			
			    <div id="total">
                    0
                </div>
				
				<div id="comprar">
                    <button class="btn__default" id="comprar"> Comprar </button>
                </div>
				
        </div>
    </div>  

<script>
var buyBtn = document.getElementById('payButton');
var buyBtn2 = document.getElementById('payButton2');
var buyBtn3 = document.getElementById('payButton3');
var comprar = document.getElementById('comprar');

var responseContainer = document.getElementById('paymentResponse'); 

var total = document.getElementById('total');
var resultado = 0;
var planos = [];
planos["1"] = 0;
planos["2"] = 0;
planos["3"] = 0;

buyBtn.addEventListener("click", function (evt) {
planos["1"] += 1;
resultado += 10;
total.innerHTML = "I - " + planos["1"] + " II - " + planos["2"] + " III - " + planos["3"] + " Total - " + resultado;
});

buyBtn2.addEventListener("click", function (evt) {
planos["2"] += 1;  
resultado += 20;
total.innerHTML = "I - " + planos["1"] + " II - " + planos["2"] + " III - " + planos["3"] + " Total - " + resultado;  
});

buyBtn3.addEventListener("click", function (evt) {
planos["3"] += 1;
resultado += 30;
total.innerHTML = "I - " + planos["1"] + " II - " + planos["2"] + " III - " + planos["3"] + " Total - " + resultado;
});

comprar.addEventListener("click", function (evt) {
    comprar.disabled = true;
    comprar.textContent = 'Processando...';

    createCheckoutSession().then(function (data) {
        if(data.sessionId){
            stripe.redirectToCheckout({
                sessionId: data.sessionId,
            }).then(handleResult3);
        }else{
            handleResult3(data);
        }
    });
});

var createCheckoutSession = function (stripe) {
    return fetch("stripe_charge.php", {
        method: "POST",
        headers: {
            "Content-Type": "aplication/json",
        },
        body: JSON.stringify({
            checkoutSession: 3,
            Planos: planos,
            Price: resultado,
        }),
    }).then(function (result3) {
        return result3.json();
    });
};

var handleResult3 = function (result3) {
    if (result3.error) {
        responseContainer.innerHTML = '<p>'+result3.error.message+'</p>';
    }
    comprar.disabled = false;
    comprar.textContent = 'Comprar';
};

// Chave pública usada pelo Stripe.js
var stripe = Stripe('<?php echo 'pk_test_51LhaL1ABTPsdKoxys9P5kPnUh5SKcyfdgVV64j1NaGdPWOY713D7GyEjdVm84Etye9GhM4e7TAwX2ALc4DyZEBsq008rZWaYR6'; ?>');

</script>

</body>
</html>