<?php
session_start();

function generateRandomString($length = 5) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}

$tokenUser =   generateRandomString();
$_SESSION['token']  =  $tokenUser;
include('verifica_login.php');
$usuario = $_SESSION['usuario'] ;
#$usuario_status =  $_SESSION['usuario_status'];
$email = $_SESSION['email'] ;


$to      = $email; // email destinatario
$subject = "Email de verificação"; // Assunto do email
$message = "
  
Obrigado por fazer login!

------------------------
Username: '$usuario'
token:    '$tokenUser'
------------------------
  
"; 
                      
$headers = "From:trabalhoseginfot@gmail.com" . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our email


?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="container">
       <!-- <div class="row row_title">
            <div class="col-lg-12 title">
                <h2>ALGUM TITULO PARA O NOSSO SISTEMA </h2>
            </div>     
        </div> -->
        <div class="row row_sucesso">
            <div class="caixa_sucesso">
                <h1>Verficação de token</h1>
                <h4 class = "text-center">Bem Vindo, <?= $usuario ?>. Um token foi enviado para seu email. Favor confirmar abaixo: </h4>
                
                <form action = "verifica_token.php" method='POST'>
                    <!--<div class="col-lg-12"><img src="img/icon.png" alt="" class="logo"></div>-->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Token</label>
                        <input name="token_form" type="text" class="form-control" id="user" placeholder="Token">
                    </div>
                
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </form>
                
            </div>
        </div>
        <form form action = "logout.php" method='POST'>
            <button type="submit" class="btn btn-danger">Sair</button>
        </form>

    </div>    
</body>
</html>