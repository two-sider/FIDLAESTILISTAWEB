<?php

$host = "localhost"; 
$user = "root"; 
$pw = "";
$db = "peluqueria";
$conexion = new mysqli($host,$user,$pw,$db);

$accion= (isset($_GET['accion']))?$_GET['accion']:'no';
switch ($accion) {
	case 'peluquero':
		
			$id_peluquero=$_REQUEST['id_peluquero'];
		
			$query="DELETE from eventos where id_peluquero='$id_peluquero'";
			$resultado= $conexion->query($query);
			
			if($resultado){

			$query="DELETE from peluqueros where id_peluquero='$id_peluquero'";
			if($resultado){
				$resultado= $conexion->query($query);
				echo '<script>alert("Peluquero Eliminado")</script> ';
				echo "<script>location.href='../admin.php'</script>";
			}else{
				Echo "<script>alert('error, intente mas tarde')</script>";
				echo "<script>location.href=' ../admin.php'</script>";	
			}

			
			}else{
				Echo "<script>alert('error, intente mas tarde')</script>";
				echo "<script>location.href=' ../admin.php'</script>";				
			}

		break;
	case 'cliente':
				
		$id_cliente=$_REQUEST['id_cliente'];
	
		$query="DELETE from eventos where id_cliente='$id_cliente'";
			$resultado= $conexion->query($query);
			
			if($resultado){

			$query="DELETE from clientes where id_cliente='$id_cliente'";
			if($resultado){
				$resultado= $conexion->query($query);
				echo '<script>alert("Cliente Eliminado")</script> ';
				echo "<script>location.href='../admin.php'</script>";
			}else{
				Echo "<script>alert('error, intente mas tarde')</script>";
				echo "<script>location.href=' ../admin.php'</script>";	
			}

			
			}else{
				Echo "<script>alert('error, intente mas tarde')</script>";
				echo "<script>location.href=' ../admin.php'</script>";				
			}
		break;
	case 'servicio':
			$id_servicio=$_REQUEST['id_servicio'];
		
			$query="DELETE from eventos where id_servicio='$id_servicio'";
			$resultado= $conexion->query($query);
			
			if($resultado){

			$query="DELETE from servicios where id_servicio='$id_servicio'";
			if($resultado){
				$resultado= $conexion->query($query);
				echo '<script>alert("Servicio Eliminado ")</script> ';
				echo "<script>location.href='../admin.php'</script>";
			}else{
				Echo "<script>alert('error, intente mas tarde')</script>";
				echo "<script>location.href=' ../admin.php'</script>";	
			}

			
			}else{
				Echo "<script>alert('error, intente mas tarde')</script>";
				echo "<script>location.href=' ../admin.php'</script>";				
			}
		break;
	default:
		echo "<script>location.href='../index.php'</script>";
		break;
		
	case 'evento' :
		
			$id_evento=$_REQUEST['id_evento'];
		
			$query="delete from eventos where id_evento='$id_evento'";
			$resultado= $conexion->query($query);
			
			if($resultado){
				echo '<script>alert("Reserva Eliminada")</script> ';
				echo "<script>location.href=' ../admin.php#section4'</script>";
			
			}else{
				Echo "Eliminar no exitoso";				
			}	
		
		
}





?>