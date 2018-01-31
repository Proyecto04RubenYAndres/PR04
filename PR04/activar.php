<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location: index.php");
} else {
    include("session.php");
    $id=$_REQUEST['id'];
    $q = "SELECT * FROM usuario WHERE mail='$id'";
    $consulta = mysqli_query($conexion, $q);
    $usuario=mysqli_fetch_array($consulta);
    //if (mysqli_num_rows($consulta)>0) {
    
        if ($usuario["estado"]=="Eliminado") {
            $q ="UPDATE usuario SET estado = 'Disponible' WHERE mail='$id'";
            
            mysqli_query($conexion, $q);
            header("location:usuarios.php");
            //echo "$q";
        }
        
        
        
    




}

?>