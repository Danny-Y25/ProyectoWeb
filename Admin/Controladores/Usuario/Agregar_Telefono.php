<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Agregar Nuevo Telefono </title>
</head>
<body>
<?php

session_start();
 if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
    header("Location: /ProyectoWeb/ProyectoWeb/public/VIsta/Login.html");
 }

 //incluir conexión a la base de datos
 include '../../../Config/conexionBD.php';
 
 $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : null;
 $tipo = isset($_POST["tipo"]) ? mb_strtoupper(trim($_POST["tipo"]), 'UTF-8') : null;
 $operadora = isset($_POST["operadora"]) ? mb_strtoupper(trim($_POST["operadora"]), 'UTF-8') : null;
 $correo = isset($_POST["correo"]) ? trim($_POST["correo"]): null;
 
 date_default_timezone_set("America/Guayaquil");
 $fecha = date('Y-m-d H:i:s', time());
 $sql = "UPDATE telefono " .
 "SET tel_numero = '$telefono', " .
 "tel_tipo = '$tipo', " .
 "tel_operadora = '$operadora', " .
 "tel_fecha_modificacion = '$fecha' " .
 "WHERE tel_codigo = $codigo";
 if ($conn->query($sql) === TRUE) {
 echo "Se ha actualizado los datos personales correctamemte!!!<br>";
 } else {
 echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
 }

//
$sql2 = "INSERT INTO telefono VALUES (0, '$telefono', '$tipo', '$operadora', 
 '$cedula', '$correo',  'N', null, null)";

  if ($conn->query($sql) === TRUE) {
  //echo "<p>Se ha creado los datos personales correctamemte!!!</p>";
    if($conn->query($sql2) === TRUE){
        //echo('se creo el telefono');
    }

  } else {
  if($conn->errno == 1062){
  echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";
  }else{
  echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
  }
  }
//

 echo "<a href='../../Vista/Usuario/MenuUser.php?correo=$correo'>Regresar</a>";
 $conn->close();
?>
</body>
</html>