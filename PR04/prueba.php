<?php
	session_start();
	include 'session.php';
	if(isset($_SESSION['username'])){
		$_SESSION['username'];

	} else {
		$_SESSION['error']="No te saltes el login!!";
		header("location: index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Hola </h1>
	<?php
		echo $_SESSION['username'];

	?>

</body>
</html>