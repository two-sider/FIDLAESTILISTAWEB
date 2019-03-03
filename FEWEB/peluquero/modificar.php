<?php

$host = "localhost"; 
$user = "root"; 
$pw = "";
$db = "peluqueria";
$conexion = new mysqli($host,$user,$pw,$db);


$id_peluquero=$_REQUEST['id_peluquero'];

$user_peluquero = $_POST['user_peluquero'];
$pass_peluquero = $_POST['pass_peluquero'];
$nombre_peluquero = $_POST['nombre_peluquero'];


$query =" UPDATE peluqueros set user_peluquero='$user_peluquero', pass_peluquero='$pass_peluquero', nombre_peluquero='$nombre_peluquero' where id_peluquero='$id_peluquero'";


$resultado= $conexion->query($query);

			if($resultado){
						echo '<script>alert("El peluquero fue modificado :D")</script> ';
						echo "<script>location.href='../peluquero.php'</script>";
				
				
			}else{
				Echo "<script>alert('error, intente mas tarde')</script>";	
				echo "<script>location.href=' ../peluquero.php'</script>";				
			}





?>