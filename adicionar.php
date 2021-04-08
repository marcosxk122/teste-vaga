<?php
  session_start();
  include_once("acoes/conexao.php");
  $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
  $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
  $adm = filter_input(INPUT_POST, 'adm', FILTER_SANITIZE_STRING);
  $result_estoque = "INSERT INTO bd_usuarios (nome, email, senha, adm) VALUES ('$nome', '$email', '$senha', '$adm')";
  $resultado = mysqli_query($conn, $result_estoque);

  if(mysqli_insert_id($conn)){
    $_SESSION['msg'] = "Cadastrado com sucesso";
    header("Location: dashboard.php");
  }else{
    header("Location: editar.php");
  }

?>
