<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if(isset($_POST['enviar'])){
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $assunto =$_POST['assunto'];
  $mensagem = $_POST['mensagem'];


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$mail->CharSet = "UTF-8";

try {

    // Configurações do servidor de e-mail
    $mail->isSMTP();
    $mail->Host = 'paloma@sunioweb.com.br';
    $mail->SMTPAuth = true;
    $mail->Port = 2525;
    $mail->Username = 'e4cdf254a9c1de';
    $mail->Password = '4cb3064efa1480';
  

    //Quem envia
    $mail->setFrom('contato@sitecrud.com', 'Site Crud');

    // Quem recebe
    $mail->addAddress('fulano@sitecrud.com', 'Fulano');       

    //Para quem responder
    $mail->addReplyTo($email, 'Retorno contato');


    //Content
    $mail->isHTML(true);                                  
    //Set email format to HTML
    $mail->Subject = "Contato Site - ".$assunto;

    // Corpo da mensagem
    $mail->Body    = "<b>Nome:</b> $nome <br>
                      <b>E-mail:</b> $email <br>
                      <b>Assunto:</b> $assunto <br>
                      <b>Mensagem:</b> $mensagem";

    $mail->AltBody = "Nome: $nome \n E-mail: $email \n Assunto: $assunto \n Mensagem: $mensagem";
    // \n é uma quebra de linha

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    
<h1>Contato usando phpmailer</h1>
<hr>

<form action="" method="POST">

<p>
  <label for="nome">Nome:</label>
  <input type="text" id="nome" name="nome">
</p>

<p>
  <label for="email">E-mail:</label>
  <input type="text" id="email" name="email">
</p>

<p>Assunto:
 <select name="assunto" id="assunto" required>
    <option value=""></option>
    <option value="duvidas">Dúvidas</option>
    <option value="reclamacoes">Reclamações</option>
    <option value="elogios">Elogios</option>
  </select> 
</p>

<p>
    <label for="mensagem">Mensagem:</label> <br>
    <textarea name="mensagem" id="mensagem" cols="30" rows="5"></textarea>
</p>

<button type="submit" name="enviar">Enviar</button>
</form>

<ul><a href="index.php">Voltar</a></ul>
    
</body>
</html>