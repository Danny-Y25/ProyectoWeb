<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <script type="text/javascript" src="../../Controladores/Usuario/BuscarUser.js">
    </script>
 <title>Menu Administrador</title>
 <link rel="stylesheet" type="text/css" href="../../../Public/Controladores/CSS/reglas.css"/>
    
    <link rel="stylesheet" type="text/css" href="../../../Public/Controladores/CSS/index.css"/>
</head>
<body  style="background-color:#094f77;">
   
   <img src="../../../imagenes/banner.jpg" width="100%" alt="">

   
<div id="etiqueta"><b >Ingrese el correo o cedula para buscar </b></div>


    <form onsubmit="return buscarPorCedula()">
        
        <input type="text" id="cedula" name="cedula" value="" placeholder="Ingrese la cedula">
        <input type="button" id="buscar" name="buscar" value="Buscar" onclick="buscarPorCedula()">
        <br>
    </form>

    <div id="informacion">
    <br>
     <button onclick="location.href='Agregar.php'" >Registrarse</button>
    </div>


 <h1>Informacion Del Usuario</h1>
 <table style="width:70% " >
 <tr>
 <th style="text-align: center " bgcolor="white" >Cedula</th>
 <th style="text-align: center" bgcolor="white">Nombres</th>
 <th style="text-align: center" bgcolor="white">Apellidos</th>
 <th style="text-align: center" bgcolor="white">Correo</th>
 <th style="text-align: center" bgcolor="white" colspan="3">Opciones</th>

 </tr>
 <?php
 session_start();
 if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
    header("Location: /ProyectoWeb/ProyectoWeb/public/VIsta/Login.html");
 }
 include '../../../Config/conexionBD.php';

 //echo($cuenta);

$sql = "SELECT * FROM usuario u, telefono t WHERE u.usu_cedula=t.usu_cedula and u.usu_eliminado = 'N'";

 $result = $conn->query($sql);

 if ($result->num_rows > 0) {

 while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo " <td>" . $row["usu_cedula"] . "</td>";
    echo " <td>" . $row['usu_nombres'] ."</td>";
    echo " <td>" . $row['usu_apellidos'] . "</td>";
    echo " <td>" . $row['usu_correo'] . "</td>";
    echo " <td> <a href='Eliminar.php?codigo=" . $row['usu_codigo'] . "'>Eliminar</a> </td>";
    echo " <td> <a href='Modificar.php?codigo=" . $row['usu_codigo'] . "'>Modificar</a> </td>";
    echo " <td> <a href='Cambiar_contrasena.php?codigo=" . $row['usu_codigo'] . "'>Cambiarcontraseña</a> </td>";
   
    
    echo "</tr>";
 }
 
 } else {
 echo "<tr>";
 echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
 echo "</tr>";
 }
 //echo " <td> <a href='../../../config/Cerrarsesion.php'>Cerrar_Sesion</a> </td>";
 
 $conn->close();
 ?>
 
 </table>

 <h1>Informacion Telefonica</h1>
 
 <br>
 <br>

 <table style="width:70%">
 <tr>
 <th style="text-align: center" bgcolor="white">Correo Dominio</th>
 <th style="text-align: center" bgcolor="white">Telefono</th>
 <th style="text-align: center" bgcolor="white">Tipo</th>
 <th style="text-align: center" bgcolor="white">Operadora</th>
 <th style="text-align: center" bgcolor="white" colspan="3">Opciones</th>
 </tr>
 <?php
 include '../../../Config/conexionBD.php';
 
 //echo($cuenta);
 
 $sql = "SELECT * FROM usuario u, telefono t WHERE u.usu_cedula=t.usu_cedula and u.usu_eliminado = 'N' and u.usu_correo=t.usu_correo";

 $result = $conn->query($sql);

 if ($result->num_rows > 0) {

 while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo " <td>" . $row ['usu_correo'] . "</td>";
    echo " <td>" . $row['tel_numero'] . "</td>";
    echo " <td>" . $row['tel_tipo'] . "</td>";
    echo " <td>" . $row['tel_operadora'] . "</td>";
    echo " <td> <a href='Eliminar_Telefono.php?codigo=" . $row['tel_codigo'] . "'>Eliminar</a> </td>";
    echo " <td> <a href='Modificar_Telefono.php?codigo=" . $row['tel_codigo'] . "'>Modificar</a> </td>";
    
    echo "</tr>";
 }
 
 } else {
 echo "<tr>";
 echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
 echo "</tr>";
 }
 
 
 $conn->close();
 //echo " <td> <a href='Agregar_Telefono.php?codigo=" . $row['tel_codigo'] . "'>Agregar</a> </td>";
 ?>
 
 </table>
 <br>
<button style="background-color: red"><a href='../../../config/Cerrarsesion.php'>Cerrar Sesion</a></button>
</body>
</html>