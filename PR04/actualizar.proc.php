<?php
session_start();
	//si existe la variable id dentro del array $_SESSION, es que la sesión ha sido iniciada, y lo que hay que hacer es redirigir al usuario a la página principal
	$id=$_REQUEST['prueba'];
	if(!isset($_SESSION['username'])){
		header("location:principal.php");
		// echo "Hola";
	} else {
		include("session.php");
		$contraseña1=$_REQUEST['contraseña_user'];
		$contraseña2=$_REQUEST['repcontraseña_user'];
		if ($contraseña1==$contraseña2) {
			
			$q = "SELECT * FROM tbl_users WHERE correo_user='$id'";
			$modificar=mysqli_query($conexion, $q);
			if ($_REQUEST['mailAnt']==$_REQUEST['correo_user']) {
				//echo "No has cambiado el mail";
				$q = "UPDATE tbl_users SET nombre_user='$_REQUEST[nombre_user]', apellido_user='$_REQUEST[apellido_user]', contraseña_user='$_REQUEST[contraseña_user]' WHERE correo_user='$id'";
				// echo "No he cambiado el email $q";
				mysqli_query($conexion, $q);
				header("location: principal.php");
			} else {
				$q = "SELECT * FROM tbl_users WHERE correo_user='$_REQUEST[correo_user]'";
				$consulta = mysqli_query($conexion, $q);
				if (mysqli_num_rows($consulta)>0) {
					// header("location: editar.php?id=$id");
					$_SESSION['existe']="El correo $_REQUEST[correo_user] ya existe.";
					header("location: actualizar.php?id=$id");
					// header("location: editar.php");
					//echo "El mail ya existe";
					
				} else {
					//hay que cambiar todos los datos del usuario
					$q = "UPDATE tbl_users SET nombre_user='$_REQUEST[nombre_user]', apellido_user='$_REQUEST[apellido_user]', correo_user='$_REQUEST[correo_user]', contraseña_user='$_REQUEST[contraseña_user]'  WHERE correo_user='$id'";
				mysqli_query($conexion, $q);
				$_SESSION['username']=$_REQUEST['correo_user'];
				header("location: principal.php");
				//echo "He cambiado el mail $q";
				}
			}
		}else{
			$_SESSION['contraseña']="Las contraseñas no coinciden.";
			header("location: actualizar.php?id=$id");
			//echo $id;
		}
	}

?>