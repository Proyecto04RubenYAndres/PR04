<?php
session_start();
if(!isset($_SESSION['username'])){
	header("location: principal.php");
} else if(isset($_SESSION['existe'])){
	$existe = $_SESSION['existe'];
} 
include("session.php");

$id=$_REQUEST['id'];

$q = "SELECT * FROM tbl_contactos WHERE correo_contacto='$id'";
$consulta=mysqli_query($conexion, $q);
if(mysqli_num_rows($consulta)>0){
	$modificar=mysqli_fetch_array($consulta);
	?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>Editar <?php echo"$id"; ?></title>
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
		<script type="text/javascript" src="js/javascript2.js"></script>
		<!-- <script type="text/javascript" src="js/mapa2.js"></script> -->
	</head>
	<body>
		<!-- ************************************ EDITAR PRUEBA HTML ****************************************** -->

		<div class="container">
			<div class="row main">
				<div class="panel-heading">
					<div class="panel-title text-center">
						<?php
						$nombre=$modificar['nombre_contacto'];
						$apellido=$modificar['apellido_contacto'];
						?>
						<h1 class="title"> <?php echo"Editando a $nombre $apellido"; ?></h1>
						<hr />
					</div>
				</div> 
				<div class="main-login main-center">
					<form name="f1" action="editar.proc.php" method="get" class="form-horizontal" onsubmit="return validar();">
						<input type="hidden" name="prueba" value="<?php echo $modificar['correo_contacto']; ?>">
						<input type="hidden" name="mailAnt" value="<?php echo $modificar['correo_contacto']; ?>">
						<input type="hidden" name="mailAnt" value="<?php echo $_REQUEST['id']; ?>">
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Nombre</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="nombre_contacto" required id="name" value="<?php echo $modificar['nombre_contacto']; ?>"/>
								</div>
							</div>
						</div>


						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Apellidos</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" required name="apellido_contacto" id="name" value="<?php echo $modificar['apellido_contacto']; ?>"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Correo</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" required name="correo_contacto" id="id_mail" onKeyUp="validateMail('id_mail')" value="<?php echo $modificar['correo_contacto']; ?>"/>
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
							<label for="name" class="cols-sm-2 control-label">Teléfono movil</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-phone-square" aria-hidden="true"></i></span>
									<input type="text" class="form-control" required name="telf_movil" id="telf_movil" value="<?php echo $modificar['telf_movil']; ?>"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Teléfono fijo</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
									<input type="text" class="form-control" required name="telf_fijo" id="telf_fijo" value="<?php echo $modificar['telf_fijo']; ?>"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Dirección casa</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-home" aria-hidden="true"></i></span>
									<input type="text" class="form-control" required name="direc_casa" id="direc_casa" value="<?php echo $modificar['direc_casa']; ?>" onchange="dirCasa()" onblur="if(document.getElementById('direc_casa').value=='') { document.getElementById('direc_casa').focus(); }"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Dirección trabajo</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-building" aria-hidden="true"></i></span>
									<input type="text" class="form-control" required name="direc_trabajo" id="direc_trabajo"  value="<?php echo $modificar['direc_trabajo']; ?>" onchange="dirTrabajo()" onblur="if(document.getElementById('direc_trabajo').value=='') { document.getElementById('direc_trabajo').focus(); }"/>
								</div>
							</div>
						</div>
						<div id="map"></div>

						<div class="form-group ">
							<button  type="submit" class="btn btn-primary btn-lg btn-block login-button">Actualizar</button>


						</form>

					</div>
					<a href="principal.php"><button  type="submit" class="btn btn-danger btn-lg btn-block login-button">Volver</button></a>
				</div>

			</div>
		</div>

		<script type="text/javascript" src="assets/js/bootstrap.js"></script>
		<script type="text/javascript" src="js/mapa2.js"></script>

		<!-- ************************************ EDITAR PRUEBA HTML ****************************************** -->
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBK3oONFB8sNGzgv5stg-r8QYLsp8UNQU4&callback=initMap"></script>
	</body>
	</html>

	<?php
} else {
	echo "No hay resultados que mostrar";
}
//Cierro else
?>