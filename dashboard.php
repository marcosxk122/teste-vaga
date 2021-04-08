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
        <?php if($adm): ?>

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
          <div class="container">
            <div class="alert alert-custom mt-5" role="alert">
              <a href="home.php">Inicio</a> / Listagem de Usuarios
            </div>
            <div class="row justify-content-end my-4 mx-1">
            <a class="btn btn-success mr-1" href="dashboard.php">Atualizar</a>
            <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#exampleModal">Cadastrar Usuario</a>
          </div>
          <div class="row justify-content-center">
          <div class="col-md col-lg">

            <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Email</th>
      <th scope="col">Senha</th>
      <th scope="col">Nome</th>
      <th scope="col">Tipo</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    <tr>

      <?php


      $sql = "SELECT * FROM bd_usuarios";
      $resultado = mysqli_query($conn, $sql) or die ("erro ao tentar cadastrar registro");
      while ($registro = mysqli_fetch_array($resultado)) {
      ?>
      <th scope="row"><?php echo $registro["id"]; ?></th>
      <td><?php echo $registro["email"]; ?></td>
      <td><?php echo $registro["senha"]; ?></td>
      <td><?php echo $registro["nome"]; ?></td>
      <td>
            <?php
            $adm = $registro["adm"];
            if ($adm) {
              echo "Administrador";
            }else{
              echo "Usuario";
            }
            ?>
      </td>
      <td><a href="editar.php?id=<?php echo $registro["id"]; ?>">Editar</a></td>
    </tr>
  <?php }; ?>
  </tbody>
</table>

          </div>
          </div>
          </div>
          </div>
        <?php endif; ?>
<!-- ######################## MODAL ################################ -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adicionar Usuario</h5>
      </div>
      <div class="modal-body">
        <form method="POST" action="adicionar.php">
        <label for="exampleInputPassword1">Nome:</label>
        <input type="text" class="form-control" name="nome" id="validationServer01" placeholder="Nome de usuario" required>
        <label for="exampleInputPassword1">Email:</label>
        <input type="email" class="form-control" name="email" id="exampleInputPassword1" placeholder="seu@email.com" required>
        <label for="exampleInputPassword1">Senha:</label>
        <input type="password" class="form-control" name="senha" id="exampleInputPassword1" placeholder="*****" required>
        <label for="exampleInputPassword1">Tipo:</label>
        <select id="inputState" name="adm" class="form-control">
          <option selected value="0">Usuario</option>
          <option value="1">Administrador</option>
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
      </div>
    </div>
  </div>
</div>
<!-- ######################################################## -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
