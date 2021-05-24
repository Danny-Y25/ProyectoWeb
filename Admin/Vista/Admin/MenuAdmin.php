<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Administrador</title>
    <link rel="stylesheet" type="text/css" href="../Controladores/CSS/reglas.css"/>
    
    <link rel="stylesheet" type="text/css" href="../Controladores/CSS/index.css"/>
    
    <link rel="stylesheet" type="text/css" href="../Controladores/CSS/2-columnas.css"/>
</head>
<body style="background-color:#094f77;">
<header>
<img src="../../../imagenes/banner.jpg" alt="">
<h1 style="color: azure;" >Guia telefonica</h1>
</header>

<table style="width:100%">
 <tr>
 <th>Cedula</th>
 <th>Nombres</th>
 <th>Apellidos</th>
 <th>Correo</th>
 <th>Tipo celular</th>
 <th>Operadora</th>
 <th>Telefono</th>
 
 </tr>
 <?php
  session_start();
  if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
  header("Location: /SistemaDeGestion/public/vista/login.html");
  }
 include '../../../config/conexionBD.php';
 $sql = "SELECT * FROM usuario";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {
  
        
            while($row = $result->fetch_assoc()) {
               
                    echo "<tr>";
                    echo " <td>" . $row["usu_cedula"] . "</td>";
                    echo " <td>" . $row['usu_nombres'] ."</td>";
                    echo " <td>" . $row['usu_apellidos'] . "</td>";
                    echo " <td>" . $row['usu_correo'] . "</td>";
                    echo " <td> <a href='eliminar.php?codigo=" . $row['usu_codigo'] . "'>Eliminar</a> </td>";
                    echo " <td> <a href='modificar.php?codigo=" . $row['usu_codigo'] . "'>Modificar</a> </td>";
                    echo " <td> <a href='cambiar_contrasena.php?codigo=" . $row['usu_codigo'] . "'>Cambiar
                   contraseña</a> </td>";
                    echo "</tr>";
                
               
            }   
           
     } else {
 echo "<tr>";
 echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
 echo "</tr>";
 }
 echo " <td> <a href='../../../config/cerrar_sesion.php'>Cerrar Sesion</a> </td>";

 $conn->close();
 ?>
 </table>
</body>
</html>