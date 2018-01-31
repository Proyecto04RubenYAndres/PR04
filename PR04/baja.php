<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location: login.php");
} else {
    include("session.php");
    $id=$_REQUEST['id'];
    $q = "SELECT * FROM tbl_users WHERE correo_user='$id'";
    $consulta = mysqli_query($conexion, $q);
    $usuario=mysqli_fetch_array($consulta);
    if (mysqli_num_rows($consulta)>0){    
            $a="DELETE FROM tbl_contactos WHERE id_user = $usuario[id_user]";
            mysqli_query($conexion, $a);	
            // echo "$a";
            if ($q==true) {
            $q="DELETE FROM tbl_users WHERE correo_user = '$id'";
            mysqli_query($conexion, $q);
            // echo "$q";
            }
            session_destroy();
            header("location:login.php");
            // echo "$q";
        } else {
        	header("location:principal.php");
        	// echo "deu";
        }
}
?>