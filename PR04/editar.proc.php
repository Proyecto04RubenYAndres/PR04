<?php
session_start();

	//si existe la variable id dentro del array $_SESSION, es que la sesión ha sido iniciada, y lo que hay que hacer es redirigir al usuario a la página principal
	if(!isset($_SESSION['username'])){
		header("location:principal.php");
		// echo "Hola";
	} else {
		include("session.php");
		$id=$_REQUEST['prueba'];
		$q = "SELECT * FROM tbl_contactos WHERE correo_contacto='$id'";
		$modificar=mysqli_query($conexion, $q);
		if ($_REQUEST['mailAnt']==$_REQUEST['correo_contacto']) {
			//echo "No has cambiado el mail";
			$q = "UPDATE tbl_contactos SET nombre_contacto='$_REQUEST[nombre_contacto]', apellido_contacto='$_REQUEST[apellido_contacto]', telf_movil='$_REQUEST[telf_movil]', telf_fijo='$_REQUEST[telf_fijo]', direc_casa='$_REQUEST[direc_casa]', direc_trabajo='$_REQUEST[direc_trabajo]' WHERE correo_contacto='$id'";
			echo "No he cambiado el email $q";
			mysqli_query($conexion, $q);
			header("location: principal.php");
		} else {
			$q = "SELECT * FROM tbl_contactos WHERE correo_contacto='$_REQUEST[correo_contacto]'";
			$consulta = mysqli_query($conexion, $q);
			if (mysqli_num_rows($consulta)>0) {
				// header("location: editar.php?id=$id");
				$_SESSION['existe']="El correo $_REQUEST[correo_contacto] ya existe.";
				header("location: editar.php?id=$id");
				// header("location: editar.php");
				//echo "El mail ya existe";
				
			} else {
				//hay que cambiar todos los datos del usuario
				$q = "UPDATE tbl_contactos SET nombre_contacto='$_REQUEST[nombre_contacto]', apellido_contacto='$_REQUEST[apellido_contacto]', correo_contacto='$_REQUEST[correo_contacto]', telf_movil='$_REQUEST[telf_movil]', telf_fijo='$_REQUEST[telf_fijo]', direc_casa='$_REQUEST[direc_casa]', direc_trabajo='$_REQUEST[direc_trabajo]' WHERE correo_contacto='$id'";
			mysqli_query($conexion, $q);
			header("location: principal.php");
			//echo "He cambiado el mail $q";
			}
		}
	}

?>