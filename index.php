<?php
    include("conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
</head>
<body>
    
<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
    <table>
        <tr>
            <th colspan="5"><h1>Lista de Usuarios</h1></th>
        </tr>
        <tr>
            
            <td>
            <label for="">DNI</label>
            <input type="text" name="dni">
            </td>
           
            <td>
                <input type="submit" name="enviar" value="BUSCAR">
            </td>
            <td>
                <a href="añadir.php">añadir</a>
            </td>
        </tr>
    </table>
</form>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombres</th>
            <th>DNI</th>
            <th>Edad</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if(isset($_POST['enviar'])){
            $dni = $_POST['dni'];
            if(empty($_POST['dni'])){
                echo "<script language='JavaScript'>
                alert('Ingresa el dni');location.assign('index.php');
                </script>
                ";
            }else{
                if(!empty($_POST['dni'])){
                    $sql = "SELECT * FROM Usuarios WHERE dni=".$dni;
                }
            }
            $resultado = sqlsrv_query($conn, $sql);
            while($filas = sqlsrv_fetch_array($resultado)){
                ?>
                <tr>
                    <td><?php echo $filas['id']?></td>
                    <td><?php echo $filas['Nombre']?></td>
                    <td><?php echo $filas['dni']?></td>
                    <td><?php echo $filas['edad']?></td>
                    
                </tr>

                <?php
            }
        }else{
            $sql="SELECT * FROM Usuarios";
            $resultado = sqlsrv_query($conn, $sql);
            while($filas = sqlsrv_fetch_array($resultado)){
                ?>
                <tr>
                    <td><?php echo $filas['id']?></td>
                    <td><?php echo $filas['Nombre']?></td>
                    <td><?php echo $filas['dni']?></td>
                    <td><?php echo $filas['edad']?></td>
                    
                </tr>
                <?php
            }

        }
        ?>
    </tbody>
</table>



</body>
</html>