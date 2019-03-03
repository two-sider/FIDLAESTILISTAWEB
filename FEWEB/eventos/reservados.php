<?php
session_start();
header('Content-Type: application/json');
$pdo= new PDO("mysql:dbname=peluqueria;host=localhost","root","");
//Seleccionar datos
$sentenciaSQL= $pdo->prepare("SELECT eventos.title, peluqueros.nombre_peluquero, servicios.color, servicios.textColor, eventos.start, eventos.end FROM eventos, peluqueros, clientes, servicios WHERE eventos.id_peluquero = peluqueros.id_peluquero and eventos.id_cliente = clientes.id_cliente and eventos.id_servicio = servicios.id_servicio");
$sentenciaSQL->execute();
$resultado= $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($resultado);

?>