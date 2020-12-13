<?php
session_start();
include('verifica_login.php');
include('conexao.php');
$usuario = $_SESSION['usuario'] ;
$usuario_status =  $_SESSION['usuario_status'];
$email = $_SESSION['email'];

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
        <div class="row menu">
            <?php include 'menu.php' ?>
        </div>
        <div class="row row_sucesso">
            <div class="caixa_sucesso">
                <h1>LOGIN EFETUADO COM SUCESSO</h1>
                <h4 class = "text-center">Bem Vindo, <?= $usuario ?> </h4>

                <form form action = "logout.php" method='POST'>
                    <button type="submit" class="btn btn-danger">Sair</button>
                </form>

            </div>
        </div>

    </div>    
</body>

<script type="text/javascript">
    var myvar='<?php echo $_SESSION['usuario_status'];?>';
    var intmyvar = parseInt(myvar);
    var statusUser;
    if(intmyvar == 0){
        statusUser = "Administrativo";
    }else if(intmyvar == 1){
        statusUser = "Comum";
    }else if(intmyvar == 2){
        statusUser = "Especial"
    }
    document.getElementById('statusUser').innerHTML = "Perfil: "+statusUser;
</script>

</html>


