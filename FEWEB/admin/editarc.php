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
		<!-- Editor clientes-->



	<div class="table-clientes" style="background-color: #ffffff; "> 
		<h1>Bienvenido</h1>
		<center><span>Volver Atrás:&nbsp;&nbsp;</span><a href="../admin.php"><button class="btn btn-primary">Regresar</button></a></center>
	<br><br>

			<div class="container">
			<table class="table">
				  <thead>
					<tr>
					  <th scope="col">Id cliente</th>
					  <th scope="col">Nombre</th>
					  <th scope="col">Apellido</th>
					  <th scope="col">Rut</th>
					  <th scope="col">Correo</th>
					  <th scope="col">Usuario Ingreso</th>
					  <th scope="col">Contraseña</th>
					  <th scope="col">Confirmar</th>
					</tr>
				  </thead>
			  
				<?php
				$id_cliente=$_REQUEST['id_cliente'];
					
				$host = "localhost"; 
	            $user = "root"; 
	            $pw = "";
	            $db = "peluqueria";

              	$conexion = new mysqli($host,$user,$pw,$db);
					
					
					$query="Select * from clientes where id_cliente='$id_cliente'";
					$resultado= $conexion->query($query);
					$row=$resultado->fetch_assoc();{
				?>
<form action="modificar.php?id_cliente=<?php echo $row['id_cliente']; ?>&accion=cliente" method="post">				
				<tbody>
					<tr>
					  <th scope="row"><?php echo $row['id_cliente']; ?></th>
					  <td><input class="form-control"  name="nombre_cliente" type="text" required placeholder="nombre cliente" value="<?php echo $row['nombre_cliente']; ?>" ></td>
					  <td><input class="form-control"  name="apellido_cliente" type="text" required placeholder="apellido cliente" value="<?php echo $row['apellido_cliente']; ?>" ></td>
					  <td><input class="form-control"  name="telefono_cliente" type="text" required placeholder="Telefono cliente" value="<?php echo $row['telefono_cliente']; ?>"></td>
					  <td><input class="form-control"  name="correo_cliente" type="email" required placeholder="correo cliente" value="<?php echo $row['correo_cliente']; ?>"></td>
					  <td><input class="form-control"  name="user_cliente" type="text" required placeholder="usuario cliente" value="<?php echo $row['user_cliente']; ?>"></td>
					  <td><input class="form-control"  name="pass_cliente" type="text" required placeholder="pass cliente" value="<?php echo $row['pass_cliente']; ?>"></td>
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