<?php
session_start();
include('verifica_login.php');
include('conexao.php');

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$status = $_POST['status'];


$query = "INSERT INTO usuario(`usuario`, `senha`, `nome`, `email`, `usuario_status`) VALUES ('$usuario','$senha','$nome','$email','$status')";

$result = mysqli_query($conexao,$query);

if($result){
    header('Location: login_success.php');
}else{
    echo 'erro na query';
    die();
}

?>