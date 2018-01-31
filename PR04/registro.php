<?php
	session_start();
	if(isset($_SESSION['username'])){
		header("location: principal.php");
	} else if(isset($_SESSION['error'])){
		$error = $_SESSION['error'];
		session_destroy();
	} else if(isset($_SESSION['eliminado'])){
		$eliminado = $_SESSION['eliminado'];
		session_destroy();
	} else if(isset($_REQUEST['id'])){
		$existe = $_REQUEST['id'];
	} else if(isset($_REQUEST['contra'])){
		$contraseña = $_REQUEST['contra'];
	}

?>
<!DOCTYPE html>
	<html>
	<head>
		<title>Nuevo usuario</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

		<!-- Website CSS style -->
		<link rel="stylesheet" type="text/css" href="assets/css/main.css">

		<!-- Website Font style -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
		
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

		<link rel="stylesheet" type="text/css" href="css/editarPrueba.css">
		<script type="text/javascript" src="js/javascript.js"></script>
	</head>
	<body>
		<?php
		if(isset($error)){
			echo "<h1>".$error."</h1>";
		}
		?>
			<div class="container">
				<div class="row main">
					<div class="panel-heading">
						<div class="panel-title text-center">
							<h1 class="title">Nuevo Usuario</h1>
							<hr />
						</div>
					</div> 
					<div class="main-login main-center">
						<form class="form-horizontal" name="f1" action="registro.proc.php" method="get" onsubmit="return validar();">
<!-- 							<input type="hidden" class="form-control" required name="id_user" id="name" value="<?php echo $iduser?>"/>
							<input type="hidden" class="form-control" required name="contacto_de" id="name" value="<?php echo $username?>"/> -->

							<div class="form-group">
								<label for="name" class="cols-sm-2 control-label">Nombre *</label>
								<div class="cols-sm-10">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
										<input type="text" class="form-control" required name="nombre_user" id="name"  placeholder="Introduce un nombre"/>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="name" class="cols-sm-2 control-label">Apellidos *</label>
								<div class="cols-sm-10">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
										<input type="text" class="form-control" required name="apellido_user" id="name"  placeholder="Introduce un apellido"/>
									</div>
								</div>
							</div>


							<div class="form-group">
								<label for="email" class="cols-sm-2 control-label">Correo *</label>
								<div class="cols-sm-10">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
										<input type="text" class="form-control" required name="correo_user"  id='id_mail' onKeyUp="validateMail('id_mail')" placeholder="Introduce un correo"/>
									</div>
									<?php
										if(isset($existe)){
											echo "<p style='color: red;'>".$existe."</p>";

										} 
										unset($_SESSION['existe']);
									?>
								</div>
							</div>

							<div class="form-group">
								<label for="name" class="cols-sm-2 control-label">Contraseña *</label>
								<div class="cols-sm-10">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
										<input type="password" class="form-control" required id="contrasena_user" name ="contraseña_user" placeholder="Introduce una contraseña"/>
									</div>
			
								</div>
							</div>

							<div class="form-group">
								<label for="name" class="cols-sm-2 control-label">Repetir Contraseña *</label>
								<div class="cols-sm-10">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
										<input type="password" class="form-control" required id="repcontrasena_user" id="repcontraseña_user" placeholder="Vuelva a introducir la contraseña"/>
									</div>
									<?php
										if(isset($contraseña)){
											echo "<p style='color: red;'>".$contraseña."</p>";

										} 
										unset($_SESSION['contraseña']);
									?>					
								</div>
							</div>


						<div class="form-group">
								<label for="email" class="cols-sm-2 control-label">Campo obligatorio *</label>
						</div>

						<div class="form-group ">
							<button type="submit" class="btn btn-primary btn-lg btn-block login-button">Registrar</button>
													</div>

					</form>
					<!-- <button  type="submit" class="btn btn-danger btn-lg btn-block login-button" href="171124_principal.php">Volver</button> -->
					<a href="login.php"><button  type="submit" class="btn btn-danger btn-lg btn-block login-button">Volver</button></a>
				</div>

			</div>
		</div>
	</br>
</br>
</br>

<script type="text/javascript" src="assets/js/bootstrap.js"></script>

<!-- ************************************ EDITAR PRUEBA HTML ****************************************** -->




</body>
</html>
