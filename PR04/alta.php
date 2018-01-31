<?php
session_start();
include 'session.php';
if(!isset($_SESSION['username'])){
	header("location: login.php");
} else if(isset($_SESSION['existe'])){
	$existe = $_SESSION['existe'];
}else if(isset($_REQUEST['id'])){
	$existe = $_REQUEST['id'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Alta Contacto</title>
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
	<script type="text/javascript" src="js/mapa1.js"></script>
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
					<h1 class="title">Nuevo Contacto</h1>
					<hr />
				</div>
			</div> 
			<div class="main-login main-center">
				<form class="form-horizontal" name="f1" action="alta.proc.php" method="get"onsubmit="return validar();">

					<!-- CONTACTO DE -->
					<?php
					$q="SELECT * FROM tbl_users WHERE correo_user='".$_SESSION['username']."'";
					$consulta = mysqli_query($conexion, $q);
					if (mysqli_num_rows($consulta)>0) {

						while ($usuarios=mysqli_fetch_array($consulta)){
							$iduser=$usuarios['id_user'];
							$username=$_SESSION['username'];



							?>

							<input type="hidden" class="form-control" required name="id_user" id="name" value="<?php echo $iduser?>"/>
							<input type="hidden" class="form-control" required name="contacto_de" id="name" value="<?php echo $username?>"/>
							<?php

						}
					}	

					?>


					<!-- FIN CONTACTO DE  -->

					<div class="form-group">
						<label for="name" class="cols-sm-2 control-label">Nombre *</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
								<input type="text" class="form-control" required name="nombre_contacto" id="name"  placeholder="Introduce un nombre"/>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="name" class="cols-sm-2 control-label">Apellidos *</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
								<input type="text" class="form-control" required name="apellido_contacto" id="name"  placeholder="Introduce un apellido"/>
							</div>
						</div>
					</div>


					<div class="form-group">
						<label for="email" class="cols-sm-2 control-label">Correo *</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
								<input type="text" class="form-control" required name="correo_contacto" id='id_mail' onKeyUp="validateMail('id_mail')" placeholder="Introduce un correo"/>  
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
						<label for="name" class="cols-sm-2 control-label">Teléfono movil *</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-phone-square" aria-hidden="true"></i></span>
								<input type="text" class="form-control" required name="telf_movil" id="telf_movil"  placeholder="Introduce un teléfono móvil"/>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="name" class="cols-sm-2 control-label">Teléfono fijo *</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
								<input type="text" class="form-control" required name="telf_fijo" id="telf_fijo"  placeholder="Introduce un teléfono fijo"/>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="name" class="cols-sm-2 control-label">Dirección casa *</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-home" aria-hidden="true"></i></span>
								<input type="text" class="form-control" required name="direc_casa" id="direc_casa" placeholder="Introduce una dirección" onchange="dirCasa()"onblur="if(document.getElementById('direc_casa').value=='') { document.getElementById('direc_casa').focus(); }"/>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="name" class="cols-sm-2 control-label">Dirección trabajo *</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-building" aria-hidden="true"></i></span>
								<input type="text" class="form-control" required name="direc_trabajo" id="direc_trabajo" placeholder="Introduce una dirección" onchange="dirTrabajo()" onblur="if(document.getElementById('direc_trabajo').value=='') { document.getElementById('direc_trabajo').focus(); }"/>
							</div>
						</div>
					</div>
					<div id="map"></div>
					<div class="form-group">
						<label for="email" class="cols-sm-2 control-label">Campo obligatorio *</label>
					</div>

					<div class="form-group ">
						<button type="submit" class="btn btn-primary btn-lg btn-block login-button">Registrar</button>
					</div>

				</form>
				<!-- <button  type="submit" class="btn btn-danger btn-lg btn-block login-button" href="171124_principal.php">Volver</button> -->
				<a href="principal.php"><button  type="submit" class="btn btn-danger btn-lg btn-block login-button">Volver</button></a>
			</div>

		</div>
	</div>
</br>
</br>
</br>

<script type="text/javascript" src="assets/js/bootstrap.js"></script>

<!-- ************************************ EDITAR PRUEBA HTML ****************************************** -->
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBK3oONFB8sNGzgv5stg-r8QYLsp8UNQU4&callback=initMap">
</script>



</body>
</html>
