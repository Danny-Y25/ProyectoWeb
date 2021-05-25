<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Eliminar datos de persona </title>
</head>
<body>
<?php

session_start();
 if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
    header("Location: /ProyectoWeb/ProyectoWeb/public/VIsta/Login.html");
 }

 //incluir conexión a la base de datos
 include '../../../config/conexionBD.php';
 
 $codigo = $_POST["codigo"];
 

 //Si voy a eliminar físicamente el registro de la tabla
 //$sql = "DELETE FROM usuario WHERE codigo = '$codigo'";
 date_default_timezone_set("America/Guayaquil");
 $fecha = date('Y-m-d H:i:s', time());
 $sql = "UPDATE telefono SET tel_eliminado = 'S', tel_fecha_modificacion = '$fecha' WHERE
tel_codigo = $codigo";

$sql2 = "SELECT * FROM telefono WHERE tel_codigo = $codigo"; 

$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    while($row1 = $result2->fetch_assoc()) {
        $correo = $row1['usu_correo'] ;
    }
}

 if ($conn->query($sql) === TRUE) {
 echo "<p>Se ha eliminado los datos correctamemte!!!</p>";
 } else {
 echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
 }
 echo "<a href='../../Vista/Usuario/MenuUser.php?correo=$correo'>Regresar</a>";
 //echo " <td> <a href='../../Vista/Usuario/MenuUser.php?"$correo"'>Regresar</a> </td>";
 $conn->close();
 
 ?>
</body>
</html>