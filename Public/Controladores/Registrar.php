<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Crear Nuevo Usuario</title>
 <style type="text/css" rel="stylesheet">
 .error{
 color: red;
 }
 </style>
</head>
<body>
    
 <?php
 //incluir conexión a la base de datos
 include '../../Config/conexionBD.php';
 $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
 $nombres = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8') : null;
 $apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null;
 $tipo = isset($_POST["tipo"]) ? mb_strtoupper(trim($_POST["tipo"]), 'UTF-8') : null;
 $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]): null;
 $correo = isset($_POST["correo"]) ? trim($_POST["correo"]): null;
 $operadora = isset($_POST["operadora"]) ? trim($_POST["operadora"]), 'UTF-8') : null;
 $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
 $rol = isset($_POST["rol"]) ? trim($_POST["rol"]), 'UTF-8') : null;
 $sql = "INSERT INTO usuario VALUES (0, '$cedula', '$nombres', '$apellidos', '$telefono', '$tipo', 
 '$operadora', '$correo', MD5('$contrasena'), '$rol',  'N', null, null)";
  if ($conn->query($sql) === TRUE) {
  echo "<p>Se ha creado los datos personales correctamemte!!!</p>";
  } else {
  if($conn->errno == 1062){
  echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";
  }else{
  echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
  }
  }
 
  //cerrar la base de datos
  $conn->close();
  echo "<a href='../vista/Registrar.html'>Regresar</a>";
 
  ?>
 </body>
 </html>