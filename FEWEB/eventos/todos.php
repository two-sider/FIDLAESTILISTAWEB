<?php
session_start();
header('Content-Type: application/json');
$pdo= new PDO("mysql:dbname=peluqueria;host=localhost","root","");
$accion= (isset($_GET['accion']))?$_GET['accion']:'leer';

switch ($accion) {
	case 'agendar':
		$sentenciaSQL = $pdo->prepare("INSERT INTO eventos(title, id_peluquero, id_cliente, id_servicio, start) VALUES(:title,:id_peluquero,:id_cliente,:id_servicio,:start)");
		$respuesta=$sentenciaSQL->execute(array(
		"title"=>$_POST['title'],
		"id_peluquero"=>$_POST['id_peluquero'],
		"id_cliente"=>$_POST['id_cliente'],
		"id_servicio"=>$_POST['id_servicio'],
		"start"=>$_POST['start']
		));
		echo json_encode($respuesta);
		break;

			case 'agendar_peluquero':
		$sentenciaSQL = $pdo->prepare("INSERT INTO eventos(title, id_peluquero, id_cliente, id_servicio, start) VALUES(:title,:id_peluquero,:id_cliente,:id_servicio,:start)");
		$respuesta=$sentenciaSQL->execute(array(
		"title"=>$_POST['title'],
		"id_peluquero"=>$_SESSION['id_peluquero'],
		"id_cliente"=>$_POST['id_cliente'],
		"id_servicio"=>$_POST['id_servicio'],
		"start"=>$_POST['start']
		));
		echo json_encode($respuesta);
		break;
		
	case 'eliminar':
		$respuesta=false;
		if (isset($_POST['id_evento'])) {
			
			$sentenciaSQL= $pdo->prepare("DELETE FROM eventos WHERE eventos.id_evento=:id_evento");
			$respuesta= $sentenciaSQL->execute(array(
				"id_evento"=>$_POST['id_evento']));
		}
		echo json_encode($respuesta);
		break;
	case 'modificar':
		# code...
		break;
	default:
		//Seleccionar datos
$sentenciaSQL= $pdo->prepare("SELECT eventos.title, clientes.user_cliente, peluqueros.nombre_peluquero, servicios.nombre_servicio, servicios.precio_servicio, servicios.color, servicios.textColor, eventos.start, eventos.end FROM eventos, peluqueros, clientes, servicios WHERE eventos.id_peluquero = peluqueros.id_peluquero and eventos.id_cliente = clientes.id_cliente and eventos.id_servicio = servicios.id_servicio");
$sentenciaSQL->execute();
$resultado= $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($resultado);
		break;
}


?>