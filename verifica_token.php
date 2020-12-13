<?php
session_start();


$tokenUser = $_SESSION['token'];

if( strcmp(strval($_POST['token_form']),strval($tokenUser)) == 0 ){
    header('Location: login_success.php');
    exit(); 
}else{
    header('Location: token.php');
    exit(); 
}

?>