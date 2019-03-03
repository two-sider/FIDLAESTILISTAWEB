<?php 
session_start();
  if ($_SESSION['id_estado'] != '3') {
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
		<!-- Editor eventos-->
	<div class="table-eventos" style="background-color: #ffffff; "> 
	<h1>Bienvenido</h1>
	<center><span>Volver Atrás:&nbsp;&nbsp;</span><a href="../cliente.php"><button class="btn btn-primary">Regresar</button></a></center>
	<br><br>
		<div class="container">
			<table class="table">
				  <thead>
					<tr>
					  <th>Id Caso</th>
					  <th>Peluquero Asignado</th>
					  <th>Servicio solicitado</th>
					  <th>Nueva Fecha</th>
					  <th>Nueva Hora</th>
					  <th>Aceptar</th>
					</tr>
				  </thead>
			  
				<?php
				$id_evento=$_REQUEST['id_evento'];
					
				$host = "localhost"; 
	            $user = "root"; 
	            $pw = "";
	            $db = "peluqueria";

              	$conexion = new mysqli($host,$user,$pw,$db);
					
					$query="Select eventos.id_evento, peluqueros.nombre_peluquero, clientes.nombre_cliente, servicios.nombre_servicio, eventos.start
						from eventos, peluqueros, clientes, servicios
						where eventos.id_peluquero = peluqueros.id_peluquero
						and eventos.id_cliente = clientes.id_cliente
						and eventos.id_servicio = servicios.id_servicio and eventos.id_evento = $id_evento";
					$resultado= $conexion->query($query);
					$row=$resultado->fetch_assoc();{
				?>
<form action="modificar.php?id_evento=<?php echo $row['id_evento']; ?>&accion=evento" method="post">				
				<tbody>
					<tr>
					  <th scope="row"><?php echo $id_evento; ?></th>
					  
			<td>
			<?php
              $host = "localhost"; 
              $user = "root"; 
              $pw = "";
              $db = "peluqueria";

              $conexion = new mysqli($host,$user,$pw,$db);

                $query = $conexion->query("SELECT * FROM peluqueros");
                
                $row = $query->num_rows;
               ?>
				
				<select class="form-control" name="txt_peluquero" id="txt_peluquero" >
                    <option value="" disabled selected>Seleccione Peluquero</option>
                    <?php
                        while($row = $query->fetch_assoc()){ 
                            echo '<option value="'.$row['id_peluquero'].'">'.$row['nombre_peluquero'].'</option>';
                        }          
                    ?>
                </select>
			</td>
			
				  <td>
<?php
              $host = "localhost"; 
              $user = "root"; 
              $pw = "";
              $db = "peluqueria";

              $conexion = new mysqli($host,$user,$pw,$db);

                $query_servicios = $conexion->query("SELECT * FROM servicios");
                
                $row = $query_servicios->num_rows;
                ?>
                <select class="form-control" name="txt_servicio" id="txt_servicio" >
                    <option value="" disabled selected>Seleccione servicio  </option>
                    <?php

                        while($row = $query_servicios->fetch_assoc()){ 
                            echo '<option value="'.$row['id_servicio'].'">'.$row['nombre_servicio'].' Precio: $'.$row['precio_servicio'].'</option>';
                        }
                    
                    ?>
                </select>
				  
				  </td>
				  <td><input class="form-control"  name="dia" type="date"></td>
					<td><input type="time" name="hora" min="10:00" max="22:00" step="1800"></td>
				  	<td><input type="submit" name="buttonr" value="Modificar" class="btn btn btn-success btn-block"></center></td> 

				</tr>
			</tbody>
			<?php	
				}
			?>	
			</table>
				<br><br><br><br>
		</div>
	</div>
</form>
</body>
</html>