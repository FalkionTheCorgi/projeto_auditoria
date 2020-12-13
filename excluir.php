<?php
include('verifica_login.php');
include('conexao.php');

$id = $_GET['id'];

$query = "DELETE FROM usuario WHERE usuario_id = '$id'";

$result = mysqli_query($conexao,$query);

if($result){
    header('Location: login_success.php');
}else{
    echo 'erro na query';
    die();
}

?>