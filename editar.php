<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link href="/css/style.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
        <title>Dashboard - Editar</title>
    </head>
    <body>
      <?php
          session_start();

          if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])){
              require("acoes/conexao.php");

              $adm  = $_SESSION["usuario"][1];
              $nome = $_SESSION["usuario"][0];
          }else{
              echo "<script>window.location = 'index.php'</script>";
          }

          if($adm): ?>

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
          <div class="container">
          <div class="row justify-content-center">
          <div class="mt-5 col-md-6 col-lg-5">
          <div class="login-wrap p-4 p-md-5">
            <?php
            $id = filter_input(INPUT_GET, 'id');
            $query = ("SELECT * FROM bd_usuarios WHERE id = '$id'");
            $resultado_usuario = mysqli_query($conn, $query);
            $row_usuario = mysqli_fetch_assoc($resultado_usuario);
            ?>
            <form method="POST" action="atualiza.php?id=<?php echo $id; ?>">
            <label for="exampleInputEmail1">Id:</label>
            <input type="text" name="id" class="form-control" id="exampleInputEmail1" readonly value="<?php echo $id; ?>">
            <label for="exampleInputPassword1">Email:</label>
            <input type="text" class="form-control" name="email" id="exampleInputPassword1" value="<?php echo $row_usuario['email']; ?>">
            <label for="exampleInputPassword1">Nome:</label>
            <input type="text" class="form-control" name="nome" id="exampleInputPassword1" value="<?php echo $row_usuario['nome']; ?>">
            <label for="exampleInputPassword1">Senha:</label>
            <input type="text" class="form-control" name="senha" id="exampleInputPassword1" value="<?php echo $row_usuario['senha']; ?>">
          <label for="exampleInputPassword1">Tipo:</label>
          <select id="inputState" name="adm" class="form-control">
            <option selected value="0">Usuario</option>
            <option value="1">Administrador</option>
          </select>
          <div class="mb-3">

          </div>
          <button type="submit" class="mt-2 btn btn-primary">Salvar</button>
          <a href="dashboard.php" class="mt-2 btn btn-warning">
          Cancelar
          </a>
          <a href="excluir.php?id=<?php echo $id; ?>" class="mt-2 btn btn-danger">
          Excluir
          </a>
        </form>
          </div>
          </div>
          </div>
          </div>
        <?php endif; ?>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
