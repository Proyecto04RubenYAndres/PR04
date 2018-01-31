<?php
	session_start();
	include("session.php");
	if ($_REQUEST[contrasena_user]==$_REQUEST[repcontrasena_user]) {
		$q = "SELECT * FROM tbl_users WHERE correo_user='$_REQUEST[correo_user]'";
				$consulta = mysqli_query($conexion, $q);
				if (mysqli_num_rows($consulta)>0) {
					$usuario=mysqli_fetch_array($consulta);
					// header("location: editar.php?id=$id");
					// $_SESSION['existe']="El correo $_REQUEST[correo_user] ya existe.";
					// header("location: editar.php");
					//echo "El mail ya existe";
					header("location: registro.php?id=El correo $usuario[correo_user] ya existe.");
					// echo $q;
				}else {

			$a = "INSERT INTO tbl_users (nombre_user,apellido_user,correo_user,contraseña_user) VALUES ('$_REQUEST[nombre_user]','$_REQUEST[apellido_user]','$_REQUEST[correo_user]','$_REQUEST[contraseña_user]')";
			// echo $a;
			$resultado = mysqli_query($conexion, $a);
			$_SESSION['username']=$_REQUEST['correo_user'];
			header("location:principal.php");
			// echo "se crea";
				}
	}else{
		header("location:registro.php?contra=Las contraseñas no coinciden ");
	}	
?>
