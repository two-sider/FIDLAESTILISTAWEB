<?php 
session_start();
  if ($_SESSION['id_estado'] != '1') {
    header("Location:login_admin.php");
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
		<!-- Editor servicios-->
	<div class="table-servicios" style="background-color: #ffffff; "> 
	<h1>Bienvenido</h1>
	<center><span>Volver Atrás:&nbsp;&nbsp;</span><a href="../admin.php"><button class="btn btn-primary">Regresar</button></a></center>
	<br><br>
		<div class="container">
			<table class="table">
				  <thead>
					<tr>
					  <th scope="col">Id</th>
					  <th scope="col">Servicio</th>
					  <th scope="col">Descripcion</th>
					  <th scope="col">Imagen</th>
					  <th scope="col">Precio</th>
					  <th scope="col">Color</th>
					  <th scope="col"> Texto</th>
					  <th scope="col">Cambios</th>
					</tr>
				  </thead>
			  
				<?php
				$id_servicio=$_REQUEST['id_servicio'];
					
				$host = "localhost"; 
	            $user = "root"; 
	            $pw = "";
	            $db = "peluqueria";

              	$conexion = new mysqli($host,$user,$pw,$db);
					
					$query="Select * from servicios where id_servicio='$id_servicio'";
					$resultado= $conexion->query($query);
					$row=$resultado->fetch_assoc();{
				?>
<form action="modificar.php?id_servicio=<?php echo $row['id_servicio']; ?>&accion=servicio" method="post" enctype="multipart/form-data">				
				<tbody>
					<tr>
					  <th scope="row"><?php echo $row['id_servicio']; ?></th>
					  <td><input class="form-control"  name="nombre_servicio" type="text" required placeholder="nombre servicio" value="<?php echo $row['nombre_servicio']; ?>" ></td>
					  <td><input class="form-control"  name="descripcion_servicio" type="text" required placeholder="descripcion servicio" value="<?php echo $row['descripcion_servicio']; ?>" ></td>
					  <td><input class="form-control"  name="img_servicio" type="file" required placeholder="imagen servicio" value="<?php echo $row['img_servicio']; ?>"></td>
					  <td><input class="form-control"  name="precio_servicio" type="text" required placeholder="precio servicio" value="<?php echo $row['precio_servicio']; ?>"></td>

					  <td><input class="form-control"  name="color" type="color" required placeholder="color" value="<?php echo $row['color']; ?>"></td>
					  <td><input class="form-control"  name="textColor" type="color" required placeholder="textColor" value="<?php echo $row['textColor']; ?>"></td>
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