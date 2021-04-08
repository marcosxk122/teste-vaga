<?php
    include_once("acoes/conexao.php");
    session_start();
    $id = filter_input(INPUT_GET, 'id');
    $result_enco = "DELETE FROM bd_usuarios WHERE id='$id'";
    $resultado_enco = mysqli_query($conn, $result_enco);
    if (mysqli_affected_rows($conn)) {
      $_SESSION['msg'] = "Apagada com sucesso";
      header("location: dashboard.php");
    }else {
      $_SESSION['msg'] = "Não apagado";
    }
  ?>
