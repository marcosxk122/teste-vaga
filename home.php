<?php
    session_start();

    if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])){
        require("acoes/conexao.php");

        $adm  = $_SESSION["usuario"][1];
        $nome = $_SESSION["usuario"][0];
    }else{
        echo "<script>window.location = 'index.html'</script>";
    }
?>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link href="css/style.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
        <title>Dashboard - <?php echo $nome; ?></title>
    </head>
    <body>

<!-- ######################NAVBAR##################### -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="home.php">M <i class="bi bi-arrow-bar-right"></i></a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    </ul>
    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $nome; ?>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
          <a href="acoes/logout.php" class="dropdown-item">
            Deslogar
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>
<!-- ######################FIM NAVBAR##################### -->
<!-- ######################MENSAGEM ALERTA##################### -->
          <?php
            if(isset(
              $_SESSION['msg'])){
              ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong><?php echo $_SESSION['msg'];echo "&nbsp;"; ?></strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              <?php
              unset($_SESSION['msg']);
            }
          ?>
          <!-- ######################FIM MENSAGEM ALERTA##################### -->


          <div class="container text-center">
          <div class="row justify-content-center">
          <div class="mt-5 col-md-6 col-lg-5">
          <div class="login-wrap p-4 p-md-5">
            <div class="avatar">
              <img src="img/check.png" alt="Avatar">
            </div>
          <h3 class="my-2 text-center">Seja bem vindo <?php echo $nome; ?>!</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
          <?php if($adm): ?>
            <a href="dashboard.php" class="btn btn-primary btn-lg">Ver usuarios</a>
          <?php endif; ?>
          </div>
          </div>
          </div>
          </div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
