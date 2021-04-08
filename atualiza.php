<?php
session_start();
include_once("acoes/conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
//$senha = password_hash($senha, PASSWORD_DEFAULT);
$adm = filter_input(INPUT_POST, 'adm', FILTER_SANITIZE_STRING);
$id = $_POST["id"];

$result_usuario = "UPDATE bd_usuarios SET nome='$nome', email='$email', senha='$senha', adm='$adm' WHERE id = '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn)){
  $_SESSION['msg'] = "Atualizado";
  header("location: dashboard.php");
}else{
  $_SESSION['msg'] = "Erro no Registro";
  header("location: editar.php");
}

?>
