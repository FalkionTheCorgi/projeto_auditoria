<?php
session_start();
include('conexao.php');

if(empty($_POST['usuario']) || empty($_POST['senha'])){
    header('Location: index.php');
    exit();
}

$usuario = mysqli_real_escape_string($conexao,$_POST['usuario']);
$senha = mysqli_real_escape_string($conexao,$_POST['senha']);

$query = "select * from usuario where usuario='$usuario' and senha=md5('$senha')";

$result = mysqli_query($conexao,$query);


$row = mysqli_num_rows($result);

if($row == 1){
    $obj = mysqli_fetch_object($result);
  
    #Classificar e redirecionar de acordo com o tipe de usuario:
    $_SESSION['autenticado'] = true;

    $_SESSION['usuario'] = $usuario;
    $_SESSION['usuario_status'] = $obj->usuario_status;
    $_SESSION['email'] = $obj->email;
    
    header('Location: login_success.php');
    #header('Location: token.php');
}else{
    mysqli_free_result($result);
    mysqli_close($conexao);
    $_SESSION['autenticado'] = false;
    header('Location: index.php');
    exit();   
}

?>