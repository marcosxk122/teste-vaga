<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <title>Sistema de login</title>
  </head>
  <body>
    <div class="container">
    <div class="row justify-content-center">
    <div class="mt-5 col-md-6 col-lg-5">
    <div class="login-wrap p-4 p-md-5">
      <div class="avatar">
      					<img src="img/user.png" alt="Avatar">
      				</div>
    <h3 class="my-4 text-center">Area de Login</h3>
    <form method="POST" action="acoes/login.php">
  <div class="form-group">
    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Digite seu id">
  </div>
  <div class="form-group">
    <input type="password" class="form-control" name="senha" id="exampleInputPassword1" placeholder="Sua senha">
  </div>
  <button type="submit" class="btn btn-primary btn-lg btn-block">Entrar</button>
</form>
    </div>
    </div>
    </div>
  </div>
    <script src="/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
