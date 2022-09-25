<?php
include("conexion.php");
 
	 $Nombres = $_POST['Nombres'];
	 $dni = $_POST['dni'];
	 $edad = $_POST['edad'];
    
	 $query = "INSERT INTO Usuarios (Nombre,dni,edad) 
	 values ('$Nombres','$dni','$edad')";
	 $resultado = sqlsrv_prepare($conn, $query);

     if (sqlsrv_execute($resultado)){
        echo "gooood";

     } else {
        echo "baaaaaaad";
     }

?>