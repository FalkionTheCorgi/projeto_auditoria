<?php
session_start();
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
        <div class="row row_form">
            <div class="caixa_login">
                <form action = "cad.php" method='POST'>
                    <!--<div class="col-lg-12"><img src="img/icon.png" alt="" class="logo"></div>-->
                    <h3>Cadastrar </h3>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Usuário</label>
                        <input name="usuario" type="text" class="form-control" id="user" placeholder="Usuário" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Senha</label>
                        <input name="senha" type="password" class="form-control" id="password" placeholder="Senha" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputnome">Nome</label>
                        <input name="nome" type="text" class="form-control" id="nome" placeholder="Nome" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputemail">Email</label>
                        <input name="email" type="text" class="form-control" id="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status" id="status" required>
                        <option value="0">admin</option>
                        <option value="1">comum</option>
                        <option value="2">especial</option>
                    </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>    
</body>
</html>