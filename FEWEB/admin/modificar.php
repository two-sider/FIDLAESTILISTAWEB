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

$user_peluquero = $_POST['user_peluquero'];
$pass_peluquero = $_POST['pass_peluquero'];
$nombre_peluquero = $_POST['nombre_peluquero'];


			$query =" UPDATE peluqueros set user_peluquero='$user_peluquero', pass_peluquero='$pass_peluquero', nombre_peluquero='$nombre_peluquero' 
			where id_peluquero='$id_peluquero'";


			$resultado= $conexion->query($query);

			if($resultado){
						echo '<script>alert("El peluquero fue modificado :D")</script> ';
						echo "<script>location.href=' ../admin.php#section1'</script>";
				
				
			}else{
				Echo "<script>alert('error, intente mas tarde')</script>";	
				echo "<script>location.href='editarp.php#section1'</script>";				
			}

		break;
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
						echo "<script>location.href='../admin.php#section2'</script>";
				
				
			}else{
				Echo "<script>alert('error, intente mas tarde')</script>";	
				echo "<script>location.href=' ../index.php#section2'</script>";				
			}
		break;
	case 'servicio':
	$carpeta = "../servicios/";
	opendir($carpeta);
	$destino = $carpeta.$_FILES['img_servicio']['name'];
	copy($_FILES['img_servicio']['tmp_name'], $destino);
	$img_servicio = $_FILES['img_servicio']['name'];
	
$id_servicio=$_REQUEST['id_servicio'];
$nombre_servicio = $_POST['nombre_servicio'];
$descripcion_servicio = $_POST['descripcion_servicio'];
$precio_servicio = $_POST['precio_servicio'];
$color = $_POST['color'];
$textColor = $_POST['textColor'];


$query =" UPDATE servicios set nombre_servicio='$nombre_servicio', descripcion_servicio='$descripcion_servicio', precio_servicio='$precio_servicio', img_servicio = '$img_servicio', color='$color', textColor='$textColor' where id_servicio='$id_servicio'";


$resultado= $conexion->query($query);

			if($resultado){
			echo '<script>alert("Servicio modificado :D")</script> ';
			echo "<script>location.href=' ../admin.php#section3'</script>";
				
				
			}else{
				Echo "<script>alert('error, intente mas tarde')</script>";	
				echo "<script>location.href='admin.php#section3'</script>";				
			}
		break;
	default:
		echo "<script>location.href='../index.php'</script>";
		break;
		
		
		
		case 'evento':
	
	
$id_evento=$_REQUEST['id_evento'];
$id_peluquero= $_POST['txt_peluquero'];
$id_cliente = $_POST['txt_cliente'];
$id_servicio = $_POST['txt_servicio'];
$dia = $_POST['dia'];
$hora = $_POST['hora'];
$start = $dia." ".$hora;


$query =" UPDATE eventos set id_peluquero='$id_peluquero', id_cliente='$id_cliente', id_servicio='$id_servicio', start = '$start' where id_evento='$id_evento'";


$resultado= $conexion->query($query);

			if($resultado){
			echo '<script>alert("Servicio modificado :D")</script> ';
			echo "<script>location.href=' ../admin.php#section4'</script>";
				
				
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