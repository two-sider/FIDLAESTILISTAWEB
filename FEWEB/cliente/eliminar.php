<?php

$host = "localhost"; 
$user = "root"; 
$pw = "";
$db = "peluqueria";
$conexion = new mysqli($host,$user,$pw,$db);


		
			$id_evento=$_REQUEST['id_evento'];
		
			$query="delete from eventos where id_evento='$id_evento'";
			$resultado= $conexion->query($query);
			
			if($resultado){
				echo '<script>alert("Reserva Eliminada")</script> ';
				echo "<script>location.href=' ../cliente.php'</script>";
			
			}else{
				Echo "Eliminar no exitoso, intente más tarde";	
				echo "<script>location.href=' ../cliente.php'</script>";			
			}	
		
		






?>