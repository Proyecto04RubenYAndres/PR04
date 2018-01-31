<?php

	session_start();

	//si existe la variable id dentro del array $_SESSION, es que la sesión ha sido iniciada, y lo que hay que hacer es redirigir al usuario a la página prueba
	if(isset($_SESSION['username'])){
		// header("location: prueba.php");
		echo "Hola existe";
	//si no existe la variable de id dentro del array $_SESSION, es que no hay sesión, y por lo tanto, hay que consultar en la base de datos y hacer lo que sea (iniciar sesión y redirigir, o bien tirar 'para atrás')
	} else {
		include("session.php");

		//$password_encriptado = md5($_REQUEST['password']);
		//echo $password_encriptado;

		$q = "SELECT * FROM tbl_users WHERE correo_user='$_REQUEST[username]' AND contraseña_user='$_REQUEST[password]'";
		echo $q;
		$resultado = mysqli_query($conexion, $q);
		if(mysqli_num_rows($resultado)>0){
			$datos_usuario=mysqli_fetch_array($resultado);

			if ($datos_usuario['estado']=="Eliminado") {
				$_SESSION['eliminado']="El usuario esta eliminado";
				header("location: principal.php");
				// echo "Hola3";
			} else {
				$_SESSION['username']=$_REQUEST['username'];
				header("location: principal.php");
				// echo "Hola2";
			}
		} else {
			$_SESSION['error']="Login incorrecto";
			header("location: login.php");
			// echo "Hola1";
		}
	}




?>