<?php
	session_start();
	include 'session.php';
	if(isset($_SESSION['username'])){
		$_SESSION['username'];

	} else {
		$_SESSION['error']="No te saltes el login!!";
		header("location: login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<!-- <script type="text/javascript" src="javascript.js"></script> -->
	<!-- Latest compiled and minified CSS -->
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


	<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script>
		function myFunction()
		{
			document.getElementById('dropdown').setAttribute("class", "dropdown open");
		}
	</script>

	<title>Pagina Principal</title>
</head>
<body>

	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- <a target="_blank" href="#" class="navbar-brand">My sApp.</a> -->
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<!-- INICIO -->
					<li class="active" style="margin-right: 10px;"><img src="img/logito1.png"></li>
					<li class="active"><a href="#">Contactos</a></li>
					<!-- <li class="dropdown" > -->
						<!-- DROPDOWN -->
						<!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown"> -->
							<!-- <span class="caret"></span> -->
						<!-- </a> -->
					<!-- </li> -->
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<span class="glyphicon glyphicon-user" ></span>
							<strong>Perfil</strong>
							<span class="glyphicon glyphicon-chevron-down"></span>
						</a>
						<ul class="dropdown-menu">
							<li>
								<div class="navbar-login">
									<div class="row">
										<div class="col-lg-4">
											<p class="text-center">
												<?php
												$qa="SELECT * FROM tbl_users WHERE correo_user='".$_SESSION['username']."'";
												$res = mysqli_query($conexion, $qa);
												//if (mysqli_num_rows($res)>0) {

													while ($usuarios=mysqli_fetch_array($res)){
														$nombre=$usuarios['nombre_user'];
														$apellido=$usuarios['apellido_user'];
														$mail=$usuarios['correo_user'];
														// $foto1=$usuarios['foto'];
														// echo $usu['usu_nombre'];
														// echo $usu['usu_apellido'];
														// echo $usu['usu_foto'];
														?>
														<span><img src='img/user.png'></span>

													</p> 										

												</div>
												<div class="col-lg-8">
													<p class="text-left"><strong><?php echo $nombre." ".$apellido;?></strong></p>
													<p class="text-left small"><?php echo $_SESSION['username']?></p>
													<p class="text-left">
													<a href="actualizar.php?id=<?php echo $usuarios['correo_user']; ?>" class="btn btn-primary btn-block btn-sm">Actualizar Datos</a>
													</p>
												</div>
											</div>
										</div>
									</li>							
							<li class="divider"></li>
							<li>
								<div class="navbar-login navbar-login-session">
									<div class="row">
										<div class="col-lg-12" style="text-align: center;">
											<p>
												<a href="logout.proc.php" class="btn btn-warning ">Cerrar Sesion</a>
												<a href="baja.php?id=<?php echo $_SESSION['username']; ?>" onClick="return confirm('Estas seguro de eliminar tu cuenta, perderas todos tus contactos');" class="btn btn-danger ">Eliminar Cuenta</a>
											</p>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
<?php
	}
	//}
?>









	<br><br><br>
	</div>
	<div class="window-contenido">
				<!-- Filtro de búsqueda -->
				<div class="window-contenido-search">
		
</div>
</div>
	
	<?php





	$q = "SELECT * FROM tbl_contactos WHERE estado='Disponible' AND contacto_de='".$_SESSION['username']."'";

	$conexionsulta = mysqli_query($conexion, $q);
	if (mysqli_num_rows($conexionsulta)>0) {
		?>
		<div class="container">
    <div class="row">
        
        
        <div class="col-md-12">
        <h4></h4>
        <div class="table-responsive">

                
              <table id="mytable" class="table table-bordred table-striped">
                   
                   	<thead>   
	                   	 <th>Nombre</th>
	                     <th>Apellidos</th>
	                     <th>Correo</th>
	                     <th>Teléfono móvil</th>
	                     <th>Teléfono fijo</th>
	                     <th>Dirección de casa</th>
	                     <th>Dirección de trabajo</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</thead>
			<?php
			//echo "<img src='$foto'>";
			while ($usuarios=mysqli_fetch_array($conexionsulta)){
				$nombre1=$usuarios['nombre_contacto'];
				$apellido1=$usuarios['apellido_contacto'];
				$mail=$usuarios['correo_contacto'];
				$movil=$usuarios['telf_movil'];
				$fijo=$usuarios['telf_fijo'];
				$casa=$usuarios['direc_casa'];
				$trabajo=$usuarios['direc_trabajo'];
				$estado=$usuarios['estado'];
				?>

				<tr>
				
					<td><?php echo "$nombre1"; ?></td>
					<td><?php echo "$apellido1"; ?></td>
					<td><?php echo "$mail"; ?></td>
					<td><?php echo "$movil"; ?></td>
					<td><?php echo "$fijo"; ?></td>
					<td><?php echo "$casa"; ?></td>
					<td><?php echo "$trabajo"; ?></td>
					<!-- <td><?php echo "$estado"; ?></td> -->
					
					<!-- EDITAR -->

					<td><a href="editar.php?id=<?php echo $usuarios['correo_contacto']; ?>"><p data-placement="top" data-toggle="tooltip" title="Editar Contacto"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></a></td>
					
					<td><a href="eliminar.php?id=<?php echo $usuarios['correo_contacto'];?>"><p data-placement="top" data-toggle="tooltip" title="Eliminar Contacto"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></a></td>
				
					
				</tr>
				
	</tbody>
	<?php

}
?>
        
</table>

	<a href="alta.php"><p data-placement="top" data-toggle="tooltip" title="Crear Usuario"><button class="btn btn-success" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-plus-sign"></span></button></p></a>

	</div>
	<?php
		
			
		} else {
			?>
			<div class="container">
    <div class="row">
        
        
        <div class="col-md-12">
        <h4></h4>
        <div class="table-responsive">

                
              <table id="mytable" class="table table-bordred table-striped">


			<tr>
				<img src="img/principal2.png" style="padding-left: 150px"/>

				</tr>
				
	</tbody>
        
</table>
</div>

	</div>
	</div>
	<a href="alta.php"><p data-placement="top" data-toggle="tooltip" title="Crear Usuario"><button class="btn btn-success" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-plus-sign"></span></button></p></a>

	<?php
	}
	?>
	
	
</body>
</html>

