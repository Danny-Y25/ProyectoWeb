<?php
 //incluir conexión a la base de datos
 include "../../Config/conexionBD.php";
 $cedula = $_GET['cedula'];
 //echo "Hola " . $cedula;

 $sql = "SELECT * FROM usuario WHERE usu_eliminado = 'N' and usu_cedula='$cedula'";
//cambiar la consulta para puede buscar por ocurrencias de letras
 $result = $conn->query($sql);
 echo " <table style='width:100%','color: white'>
 <tr>
 <th>Cedula</th>
 <th>Nombres</th>
 <th>Apellidos</th>
 <th>Telefono</th>
 <th>Tipo-Telefono</th>
 <th>Operadora</th>
 <th>Correo</th>
 <th>Rol</th>
 <th></th>
 <th></th>
 <th></th>
 </tr>";
 if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {

 echo "<tr>";
 echo " <td>" . $row['usu_cedula'] . "</td>";
 echo " <td>" . $row['usu_nombres'] ."</td>";
 echo " <td>" . $row['usu_apellidos'] . "</td>";
 echo " <td>" . $row['usu_telefono'] . "</td>";
 echo " <td>" . $row['usu_tipo_telefono'] . "</td>";
 echo " <td>" . $row['usu_operadora'] . "</td>";
 echo " <td>" . $row['usu_correo'] . "</td>";
 echo " <td>" . $row['usu_rol'] . "</td>";
 echo "</tr>";
 }
 } else {
 echo "<tr>";
 echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
 echo "</tr>";
 }
 echo "</table>";
 
 
 $conn->close();

?>