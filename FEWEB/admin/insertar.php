<?php
	require("../conexiones/connect_db.php");


$accion= (isset($_GET['accion']))?$_GET['accion']:'no';
switch ($accion) {
	case 'peluquero':
		

	$user_peluquero  	= $_POST['user_peluquero'];
	$pass_peluquero   	= $_POST['pass_peluquero'];
	$nombre_peluquero 	= $_POST['nombre_peluquero'];
	$id_estado			= $_POST['id_estado'];

	
	$query 			= 	"insert into peluqueros(user_peluquero,pass_peluquero,nombre_peluquero,id_estado) 
						values ('$user_peluquero','$pass_peluquero','$nombre_peluquero','$id_estado')";
	$resultado= $mysqli->query($query);
	
	
	
	if($resultado){
		echo '<script>alert("Datos guardados exitosamente")</script> ';
		echo "<script>location.href=' ../admin.php#section1'</script>";

	}else{
		echo "<script>alert('error, intente mas tarde')</script>";	
		echo "<script>location.href='admin.php#section1'</script>";

	}

		break;
	case 'servicio':
	$carpeta = "../servicios/";
	opendir($carpeta);
	$destino = $carpeta.$_FILES['img_servicio']['name'];
	copy($_FILES['img_servicio']['tmp_name'], $destino);
	$img_servicio = $_FILES['img_servicio']['name'];


	$nombre_servicio = $_POST['nombre_servicio'];
	$descripcion_servicio	= $_POST['descripcion_servicio'];
	$precio_servicio	= $_POST['precio_servicio'];
	$color	= $_POST['color'];
	$textColor	= $_POST['textColor'];

	
	$query 		= 	"insert into servicios( nombre_servicio, descripcion_servicio, precio_servicio, img_servicio, color, textColor) values ('$nombre_servicio',
	'$descripcion_servicio','$precio_servicio','$img_servicio','$color','$textColor')";
	
	
	$resultado= $mysqli->query($query);
	
	
		if($resultado){
		echo '<script>alert("Datos guardados exitosamente")</script> ';
		echo "<script>location.href=' ../admin.php#section2'</script>";

	}else{
		
		echo '<script>alert("Datos no insertados")</script> ';
		echo "<script>location.href=' ../admin.php#section2'</script>";
	}
		break;
		case 'agendar_admin':
	require("../conexiones/connect_db.php");
	$id_cliente   	= $_POST['txt_cliente'];
	$id_peluquero 	= $_POST['txt_peluquero'];
	$id_servicio	= $_POST['txt_servicio'];
	$dia			= $_POST['dia'];
	$hora			= $_POST['hora'];
	$start 			= $dia." ".$hora;
	
	$query 			= 	"insert into eventos(id_cliente,id_peluquero,id_servicio,start) 
						values ('$id_cliente','$id_peluquero','$id_servicio','$start')";
	$resultado= $mysqli->query($query);
	
	
	
	if($resultado){
		echo '<script>alert("Reserva agregada exitosamente")</script> ';
		echo "<script>location.href=' ../admin.php#section3'</script>";

	}else{
		echo "<script>alert('error, intente mas tarde')</script>";	
		echo "<script>location.href='admin.php#section3'</script>";

	}
			break;
	default:
		echo "<script>location.href='../index.php'</script>";
		break;
}





?>
