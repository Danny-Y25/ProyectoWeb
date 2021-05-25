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

 $sql = "SELECT usu_cedula FROM usuario WHERE usu_correo = '$correo'";

$result = $conn->query($sql);
 if ($result->num_rows > 0) {
    while($row1 = $result->fetch_assoc()) {
        $cedula=$row1['usu_cedula'];
    }
    } else {
    echo "<tr>";
    echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
    echo "</tr>";
    }
echo($cedula);



//
$sql2 = "INSERT INTO telefono VALUES (0, '$telefono', '$tipo', '$operadora', 
   'N', null, null,'$cedula', '$correo')";

  if ($conn->query($sql2) === TRUE) {
 
        echo('se creo el telefono');
  } else {
  if($conn->errno == 1062){
  echo "<p class='error'>La persona con el numero $telefono ya esta registrada en el sistema </p>";
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