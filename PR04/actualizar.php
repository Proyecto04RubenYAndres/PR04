<?php
session_start();
	if(!isset($_SESSION['username'])){
		header("location: principal.php");
	} else if(isset($_SESSION['existe'])){
		$existe = $_SESSION['existe'];
		
	} else if(isset($_SESSION['contraseña'])){
		$contraseña = $_SESSION['contraseña'];
	}  
	include("session.php");
	
		$id=$_REQUEST['id'];
	
		$q = "SELECT * FROM tbl_users WHERE correo_user='$id'";
		$consulta=mysqli_query($conexion, $q);
		if(mysqli_num_rows($consulta)>0){
			$modificar=mysqli_fetch_array($consulta);
			?>

			<!DOCTYPE html>
			<html>
				<head>
					<title>Actualizar <?php echo"$id"; ?></title>
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
					<!-- ************************************ EDITAR PRUEBA HTML ****************************************** -->

					<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               	<?php
	               	$nombre=$modificar['nombre_user'];
	               	$apellido=$modificar['apellido_user'];
	               	?>
	               		<h1 class="title"> <?php echo"Editando el perfil de $nombre $apellido"; ?></h1>
	               		<hr />
	               	</div>
	            </div> 
				<div class="main-login main-center">
					<form name="f1" action="actualizar.proc.php" method="get" class="form-horizontal"onsubmit="return validar();">
						<input type="hidden" name="prueba" value="<?php echo $modificar['correo_user']; ?>">
						<input type="hidden" name="mailAnt" value="<?php echo $modificar['correo_user']; ?>">
						<input type="hidden" name="mailAnt" value="<?php echo $_REQUEST['id']; ?>">
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Nombre</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="nombre_user" required id="name" value="<?php echo $modificar['nombre_user']; ?>"/>
								</div>
							</div>
						</div>


						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Apellidos</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" required name="apellido_user" id="name" value="<?php echo $modificar['apellido_user']; ?>"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Correo</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>

									<input type="text" class="form-control" required name="correo_user" id="id_mail" onKeyUp="validateMail('id_mail')" value="<?php echo $modificar['correo_user']; ?>"/>
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
							<label for="name" class="cols-sm-2 control-label">Contraseña</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
									<input type="password" class="form-control" required name="contraseña_user" id="contrasena_user"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Repetir Contraseña</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
									<input type="password" class="form-control" required name="repcontraseña_user" id="repcontrasena_user"/>
								</div>
								<?php
									if(isset($contraseña)){
										echo "<p style='color: red;'>".$contraseña."</p>";
										} 
										unset($_SESSION['contraseña']);
								?>
							</div>
						</div>

						<div class="form-group ">
						<button  type="submit" class="btn btn-primary btn-lg btn-block login-button">Actualizar</button>
						
						
					</form>
					
					</div>
					<a href="principal.php"><button  type="submit" class="btn btn-danger btn-lg btn-block login-button">Volver</button></a>
				</div>

			</div>
		</div>

		<script type="text/javascript" src="assets/js/bootstrap.js"></script>


		<!-- ************************************ EDITAR PRUEBA HTML ****************************************** -->

			</body>
			</html>

			<?php
		}else {
			echo "No hay resultados que mostrar";
		}
//Cierro else
?>