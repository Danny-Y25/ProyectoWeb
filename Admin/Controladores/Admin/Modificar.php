<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Modificar datos de persona </title>
</head>
<body>
<?php

session_start();
$valor_rol=$_SESSION['rol'];
if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE || $valor_rol == "USER") {
   header("Location: /ProyectoWeb/ProyectoWeb/public/VIsta/Login.html");
}
 //incluir conexión a la base de datos
 include '../../../Config/conexionBD.php';
 $codigo = $_POST["codigo"];
 $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
 $nombres = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8') : null;
 $apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null;
 $correo = isset($_POST["correo"]) ? trim($_POST["correo"]): null;
 
 date_default_timezone_set("America/Guayaquil");
 $fecha = date('Y-m-d H:i:s', time());
/*$sql1 = "UPDATE telefono " .
 "SET usu_correo = '$correo', " .
 "WHERE usu_cedula = $cedula";
 echo("usuario");*/

 
 $sql = "UPDATE usuario " .
 "SET usu_cedula = '$cedula', " .
 "usu_nombres = '$nombres', " .
 "usu_apellidos = '$apellidos', " .
 "usu_correo = '$correo', " .
 "usu_fecha_modificacion = '$fecha' " .
 "WHERE usu_codigo = $codigo";



 if ($conn->query($sql) === TRUE) {
 echo "Se ha actualizado los datos personales correctamemte!!!<br>";
 } else {
     echo("notesalio");
 echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
 }
 echo "<a href='../../Vista/Admin/MenuAdmin.php?correo=$correo'>Regresar</a>";
 $conn->close();
?>
</body>
<br>
<div >
        
    </div>
</html>