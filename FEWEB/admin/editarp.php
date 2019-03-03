<?php 
session_start();
  if ($_SESSION['id_estado'] != '1') {
    header("Location:../login_admin.php");
  }
	?>
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
		<div class="table-peluqueros" style="background-color: #ffffff; "> 
		<h1>Bienvenido</h1>
		<!-- Editor peluqueros-->
	
	
	<center><span>Volver Atrás:&nbsp;&nbsp;</span><a href="../admin.php"><button class="btn btn-primary">Regresar</button></a></center>
	<br><br>
	
		<div class="container">
			<table class="table">
				  <thead>
					<tr>
					  <th scope="col">Id</th>
					  <th scope="col">Usuario Peluquero</th>
					  <th scope="col">Contraseña</th>
					  <th scope="col">Nombre Peluquero</th>
					</tr>
				  </thead>
			  
				<?php
				$id_peluquero=$_REQUEST['id_peluquero'];
					
				$host = "localhost"; 
	            $user = "root"; 
	            $pw = "";
	            $db = "peluqueria";

              $conexion = new mysqli($host,$user,$pw,$db);
					
					$query="Select * from peluqueros where id_peluquero='$id_peluquero'";
					$resultado= $conexion->query($query);
					$row=$resultado->fetch_assoc();{
				?>
<form action="modificar.php?id_peluquero=<?php echo $row['id_peluquero']; ?>&accion=peluquero" method="post">				
				<tbody>
					<tr>
					  <th scope="row"><?php echo $row['id_peluquero']; ?></th>
					  <th><input class="form-control"  name="user_peluquero" type="text" required placeholder="usuario peluquero" value="<?php echo $row['user_peluquero']; ?>" ></th>
					  <td><input class="form-control"  name="pass_peluquero" type="text" required placeholder="pass peluquero" value="<?php echo $row['pass_peluquero']; ?>" ></td>
					  <td><input class="form-control"  name="nombre_peluquero" type="text" required placeholder="nombre peluquero" value="<?php echo $row['nombre_peluquero']; ?>" ></td>
					  <td><center><input type="submit" name="buttonr" value="Modificar" class="btn btn btn-success btn-block"></center></td> 
					</tr>
				</tbody>
				<?php	
					}
				?>	
			</table>
		</div>
	</div>
</form>
</body>
</html>