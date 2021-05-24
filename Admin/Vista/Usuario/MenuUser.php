<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <script type="text/javascript" src="../..//Controladores/Usuario/BuscarUser.js">
    </script>
 <title>Menu Usuarios</title>
</head>
<body>


    <form onsubmit="return buscarPorCedula()">
    
        <input type="text" id="cedula" name="cedula" value="">
        <input type="button" id="buscar" name="buscar" value="Buscar" onclick="buscarPorCedula()">
        <br>
    </form>

    <div id="informacion"><b>Datos de la persona</b></div>



 <table style="width:100%">
 <tr>
 <th>Cedula</th>
 <th>Nombres</th>
 <th>Apellidos</th>
 <th>Dirección</th>
 <th>Telefono</th>
 <th>Correo</th>
 <th>Fecha Nacimiento</th>
 </tr>
 <?php
 session_start();
 if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
 header("Location: /ProyectoWeb/public/VIsta/Login.html");
 }
 include '../../../Config/conexionBD.php';
 $cuenta = $_GET['correo'];
 echo($cuenta);
 $sql = "SELECT * FROM usuario";
 $sql4 = "SELECT * FROM usuario u, telefono t WHERE u.usu_cedula=t.usu_cedula and u.usu_eliminado = 'N' and u.usu_correo='$cuenta'";

 $result = $conn->query($sql4);

 if ($result->num_rows > 0) {

 while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo " <td>" . $row["usu_cedula"] . "</td>";
    echo " <td>" . $row['usu_nombres'] ."</td>";
    echo " <td>" . $row['usu_apellidos'] . "</td>";
    echo " <td>" . $row['usu_correo'] . "</td>";
    echo " <td>" . $row['tel_numero'] . "</td>";
    echo " <td>" . $row['tel_tipo'] . "</td>";
    echo " <td>" . $row['tel_operadora'] . "</td>";
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
 echo " <td> <a href='../../../config/Cerrarsesion.php'>Cerrar Sesion</a> </td>";
 $conn->close();
 ?>
 </table>
</body>
</html>