<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Eliminar Usuario </title>
</head>
<body>
<?php

session_start();
$valor_rol=$_SESSION['rol'];
/*echo($valor_rol);
if($valor_rol == "ADMIN"){
  echo("denegado");
}*/
if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE || $valor_rol == "USER") {
   header("Location: /ProyectoWeb/ProyectoWeb/public/VIsta/Login.html");
}
 //incluir conexión a la base de datos
 include '../../../config/conexionBD.php';
 
 $codigo = $_POST["codigo"];
 

 //Si voy a eliminar físicamente el registro de la tabla
 //$sql = "DELETE FROM usuario WHERE codigo = '$codigo'";
 date_default_timezone_set("America/Guayaquil");
 $fecha = date('Y-m-d H:i:s', time());
 $sql = "UPDATE usuario SET usu_eliminado = 'S', usu_fecha_modificacion = '$fecha' WHERE
usu_codigo = $codigo";
$sql2 = "SELECT * FROM usuario WHERE usu_codigo = $codigo"; 

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
 
 header("Location: ../../Vista/Admin/MenuAdmin.php");
 $conn->close();

 ?>
</body>
</html>