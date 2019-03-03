<!DOCTYPE html>
<html lang="es">
<head>
	<title>Login-Peluquero</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/img-responsive.css">

</head>
<body background="img/background.jpg">
	<center>
		<h1>Bienvenido</h1>
    <div class="card" style="width: 18rem;">
  		<div class="card-body">
    		<h3 class="card-title">Ingresar Peluquero/a</h3>
    	<p class="card-text">
    	<form action="validar.php" method="post">
			  	<br>
		  <div class="form-group">
			<label for="exampleInputEmail1">Usuario:</label>
			<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtlogin" placeholder="Ingrese correo a iniciar">
		  </div>
		  <div class="form-group">
			<label for="exampleInputPassword1">Contraseña</label>
			<input type="password" class="form-control" id="exampleInputPassword1" name="pass_peluquero" placeholder="contraseña">
		  </div>
		  <br>
		  <button type="submit" class="btn btn-primary" id="accion" name="accion" value="login-peluquero">Ingresar</button>
		</form>
    	</p>
  		</div>
	</div>
	</center>
	
</body>
</html>