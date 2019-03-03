<?php

$host = "localhost"; 
$user = "root"; 
$pw = "";
$db = "peluqueria";
$conexion = new mysqli($host,$user,$pw,$db);

$accion= (isset($_GET['accion']))?$_GET['accion']:'no';
switch ($accion) {
	case 'cliente':
		$id_cliente=$_REQUEST['id_cliente'];

$nombre_cliente = $_POST['nombre_cliente'];
$apellido_cliente = $_POST['apellido_cliente'];
$telefono_cliente = $_POST['telefono_cliente'];
$correo_cliente = $_POST['correo_cliente'];
$user_cliente = $_POST['user_cliente'];
$pass_cliente = $_POST['pass_cliente'];


$query =" UPDATE clientes set nombre_cliente='$nombre_cliente', apellido_cliente='$apellido_cliente', telefono_cliente='$telefono_cliente', 
		correo_cliente='$correo_cliente', user_cliente='$user_cliente', pass_cliente='$pass_cliente' where id_cliente='$id_cliente'";


$resultado= $conexion->query($query);

			if($resultado){
						echo '<script>alert("El cliente fue modificado :D")</script> ';
						echo "<script>location.href='../cliente.php'</script>";
				
				
			}else{
				Echo "<script>alert('error, intente mas tarde')</script>";	
				echo "<script>location.href=' ../cliente.php'</script>";				
			}
		break;
		case 'evento':
	
	
$id_evento=$_REQUEST['id_evento'];
$id_peluquero= $_POST['txt_peluquero'];
$id_servicio = $_POST['txt_servicio'];
$dia = $_POST['dia'];
$hora = $_POST['hora'];
$start = $dia." ".$hora;


$query =" UPDATE eventos set id_peluquero='$id_peluquero', id_servicio='$id_servicio', start = '$start' where id_evento='$id_evento'";


$resultado= $conexion->query($query);

			if($resultado){
			echo '<script>alert("evento modificado :D")</script> ';
			echo "<script>location.href=' ../cliente.php'</script>";
				
				
			}else{
				Echo "<script>alert('error, no se pudo actualizar')</script>";	
				echo $query	;			
			}
		break;
	default:
		echo "<script>location.href='../index.php'</script>";
		break;
		
		
		
		
		
		
		
}





?>