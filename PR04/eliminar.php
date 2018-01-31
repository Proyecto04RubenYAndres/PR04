<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location: login.php");
} else {
    include("session.php");
    $id=$_REQUEST['id'];
    $q = "SELECT * FROM tbl_contactos WHERE correo_contacto='$id'";
    $consulta = mysqli_query($conexion, $q);
    $usuario=mysqli_fetch_array($consulta);
    //if (mysqli_num_rows($consulta)>0) {
    
        if ($usuario["estado"]=="Disponible") {
            $q ="UPDATE tbl_contactos SET estado = 'Eliminado' WHERE correo_contacto='$id'";
            
            mysqli_query($conexion, $q);
            header("location:principal.php");
            // echo "$q";
        }
        
        
        
    




}

?>