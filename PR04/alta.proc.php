<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header("location: login.php");
	}
		include("session.php");
		$q = "SELECT * FROM tbl_contactos WHERE correo_contacto='$_REQUEST[correo_contacto]'";
		$consulta=mysqli_query($conexion, $q);
		if (mysqli_num_rows($consulta)>0) {
			$contacto=mysqli_fetch_array($consulta);
			header("location: alta.php?id=El correo $contacto[correo_contacto] ya existe.");
		}else{
			$a = "INSERT INTO tbl_contactos (nombre_contacto,apellido_contacto,correo_contacto,telf_movil,telf_fijo,direc_casa,direc_trabajo,contacto_de,estado,id_user) VALUES ('$_REQUEST[nombre_contacto]','$_REQUEST[apellido_contacto]','$_REQUEST[correo_contacto]','$_REQUEST[telf_movil]', '$_REQUEST[telf_fijo]','$_REQUEST[direc_casa]','$_REQUEST[direc_trabajo]','$_REQUEST[contacto_de]','Disponible','$_REQUEST[id_user]')";
		// echo $a;
		$resultado = mysqli_query($conexion, $a);
		header("location:principal.php");
		}
?>
