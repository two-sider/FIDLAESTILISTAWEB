<?php
session_start();
	require("conexiones/connect_db.php");

$accion=$_POST['accion'];

switch ($accion) {
	case 'login-admin':
	$username=$_POST['txtlogin'];
	$pass=$_POST['pass_admin'];


	$sql=mysqli_query($mysqli,"SELECT * FROM admin WHERE user_admin='$username' and id_estado='1'");
	if($f=mysqli_fetch_assoc($sql)){
		if($pass==$f['pass_admin']){
			$_SESSION['id_admin']=$f['id_admin'];
			$_SESSION['id_estado']=$f['id_estado'];
			
			echo '<script>alert("Bienvenido usuario")</script>"';
			echo "<script>location.href='admin.php'</script>";
		}else{
			echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
		
			echo "<script>location.href='login_admin.php'</script>";
		}
		
	}else{
		
		echo '<script>alert("ESTE USUARIO NO EXISTE, PORFAVOR REGISTRESE PARA PODER INGRESAR")</script> ';
		
		echo "<script>location.href='login_admin.php'</script>";	

	}
		break;
	case 'login-peluquero':
	$username=$_POST['txtlogin'];
	$pass=$_POST['pass_peluquero'];

	$sql=mysqli_query($mysqli,"SELECT * FROM peluqueros WHERE user_peluquero='$username' and id_estado='2'");
	if($f=mysqli_fetch_assoc($sql)){
		if($pass==$f['pass_peluquero']){
			$_SESSION['id_peluquero']=$f['id_peluquero'];
			$_SESSION['nombre_peluquero']=$f['nombre_peluquero'];
			$_SESSION['id_estado']=$f['id_estado'];
			
			echo '<script>alert("Bienvenido Peluquero")</script>"';
			echo "<script>location.href='peluquero.php'</script>";
		}else{
			echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
		
			echo "<script>location.href='login_peluquero.php'</script>";
		}
		
	}else{
		
		echo '<script>alert("ESTE USUARIO NO EXISTE, PORFAVOR REGISTRESE PARA PODER INGRESAR")</script> ';
		
		echo "<script>location.href='login_peluquero.php'</script>";	

	}
		break;
	case 'login-cliente':
		$username=$_POST['txtlogin'];
		$pass=$_POST['txtpass'];

	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$sql=mysqli_query($mysqli,"SELECT * FROM clientes WHERE user_cliente='$username'");
	if($f=mysqli_fetch_assoc($sql)){
		if($pass==$f['pass_cliente']){
			$_SESSION['id_cliente']=$f['id_cliente'];
			$_SESSION['nombre_cliente']=$f['nombre_cliente'];
			$_SESSION['apellido_cliente']=$f['apellido_cliente'];
			$_SESSION['id_estado']=$f['id_estado'];
			
			echo '<script>alert("Bienvenido usuario")</script>"';
			echo "<script>location.href='cliente.php'</script>";
		}else{
			echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
		
			echo "<script>location.href='index.php/#section6'</script>";
		}
		
	}else{
		
		echo '<script>alert("ESTE USUARIO NO EXISTE, PORFAVOR REGISTRESE PARA PODER INGRESAR")</script> ';
		
		echo "<script>location.href='index.php/#section6'</script>";	

	}
		break;
		case 'registrar-cliente':
		$nombre_cliente 	= $_POST['nombre_cliente'];
		$apellido_cliente   = $_POST['apellido_cliente'];
		$telefono_cliente 	= $_POST['telefono_cliente'];
		$correo_cliente		= $_POST['correo_cliente'];
		$user_cliente 		= $_POST['user_cliente'];
		$pass_cliente		= $_POST['pass_cliente'];
		$id_estado		    = $_POST['id_estado'];

		
		$query 			= 	"insert into clientes(nombre_cliente,apellido_cliente,telefono_cliente,correo_cliente,user_cliente,pass_cliente ,id_estado) 
							values ('$nombre_cliente','$apellido_cliente','$telefono_cliente','$correo_cliente','$user_cliente','$pass_cliente','$id_estado')";
		$resultado= $mysqli->query($query);
		
		
		
		if($resultado){
			echo '<script>alert("Datos guardados exitosamente")</script> ';
			echo "<script>location.href='index.php'</script>";

		}
			break;
	default:
		echo "<script>location.href='index.php'</script>";
		break;
}


?>