<?php
//Import PHPMailer classes into the global namespace
//tem que estar sempre no topo do Script.
use src\PHPMailer;
use src\SMTP;
use src\Exception;

//No futuro, quando o gerenciador composer for usado, basta chamar o autoload. 
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

//Cria instância da Classe PHPMailer
$mail = new PHPMailer(true);

try {
    //Ative esta linha para usar o Debug e descobrir erros.
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    
    //Vamos usar o protocolo SMTP para o envio.
    $mail->isSMTP();
    
    //Este é o servidor do Gmail através do qual o email será enviado
    $mail->Host       = 'smtp.gmail.com';
    
    //Ativa autenticação. Sem isso o Gmail não realizará o envio.
    $mail->SMTPAuth   = true; 
    
    //Username. No caso do Gmail, é o endereço de email completo.
    $mail->Username   = 'salao.estetica.beleza10@gmail.com';
    
    //O Gmail exige uma Senha de aplicativo. A sua senha normal não vai funcionar.
    $mail->Password   = 'jgvykbangnfolply';
    
    //Ativa a encriptação.
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    
    //Protocolo SMTP usa a porta 465 por padrão. Está sendo substituída pela 587.
    $mail->Port       = 465;

    //Remetente
    $mail->setFrom('salao.estetica.beleza10@gmail.com', 'Estética & Beleza');
    
    //Destinatário
    $mail->addAddress($campoemail, $camponome);

    //Conteúdo do Email
    
    //Vamos usar HTML.
    $mail->isHTML(true);
    
    //Assunto
    $mail->Subject = 'Teste PHPMailer';
    
    //Corpo do Email
    $mail->Body    = 'Este é um <b>Teste.</b>';

    //Envio
    $mail->send();
    
    echo 'Messagem enviada';
} catch (Exception $e) {
    echo "Messagem não foi enviada. Mailer Error: {$mail->ErrorInfo}";
}
?>
