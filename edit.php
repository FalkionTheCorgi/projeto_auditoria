<?php
include('verifica_login.php');
include('conexao.php');

$id = $_POST['id'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$usuario_status = $_POST['status'];

$query = "UPDATE usuario SET usuario='$usuario',senha='$senha', nome='$nome', email='$email', usuario_status='$usuario_status' WHERE usuario_id = $id";

$result = mysqli_query($conexao,$query);

if($result){
    header('Location: login_success.php');
}else{
    echo 'erro na query';
    die();
}

?>