<?php 
session_start();
  if ($_SESSION['id_estado'] != '1') {
    header("Location:login_admin.php");
  }?>
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
<body background="../img/background.jpg">
	<center>
		<div class="container" style="background-color: #ffffff; ">
	
	<center><span>Volver Atrás:&nbsp;&nbsp;</span><a href="../admin.php"><button class="btn btn-primary">Regresar</button></a></center>
	<br><br>
		<div class="col">
			<span>Registrar</span>
			<form  action="insertar.php?accion=peluquero" method="POST">
			  <div class="form-group">
				<label for="exampleInputPassword1">Usuario inicio peluquero:</label>
				<input type="text" class="form-control" id="exampleInputPassword1" name="user_peluquero" placeholder="Usuario con cual se ingresa" required>
			  </div>
			  
			  <div class="form-group">
				<label for="exampleInputPassword1">Contraseña peluquero:</label>
				<input type="text" class="form-control" id="exampleInputPassword1" name="pass_peluquero"  placeholder="Contraseña del peluquero" required>
			  </div>
			  
			  <div class="form-group">
				<label for="exampleInputPassword1">Nombre Peluquero:</label>
				<input type="text" class="form-control" id="exampleInputPassword1" name="nombre_peluquero" placeholder="Nombre completo peluquero" required>
				<small id="emailHelp" class="form-text text-muted">Un Nombre y apellido por lo menos</small>
			  </div>
			
			  <input type="text" hidden name="id_estado" value="2"> 
			  
			<br>
			  <button type="submit" class="btn btn-primary">Crear Peluquero</button>
			</form>	
			<br>
		</div>
	</div>
</body>
</html>