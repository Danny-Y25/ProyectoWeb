<?php
 //incluir conexión a la base de datos
 include "../../Config/conexionBD.php";
 $cedula = $_GET['cedula'];
 //echo "Hola " . $cedula;

 $sql = "SELECT * FROM usuario WHERE usu_eliminado = 'N' and usu_cedula='$cedula'";
 $sql2 = "SELECT * FROM telefono WHERE usu_cedula='$cedula'";
 
 
//cambiar la consulta para puede buscar por ocurrencias de letras
 $result = $conn->query($sql);
 $result2 = $conn->query($sql2);
 

 echo " <table style='width:100%','color: white'>
 <tr>
 <th>Cedula</th>
 <th>Correo</th>
 <th>Telefono</th>
 <th>Tipo</th>
 <th>Operadora</th>
 <th></th>
 <th></th>
 <th></th>
 </tr>";
 
 
 if ($result->num_rows > 0) {
 while($row1 = $result2->fetch_assoc()) {

 echo "<tr>";
 echo " <td>" . $row1['usu_cedula'] . "</td>";
 echo " <td>" . $row1['usu_correo'] . "</td>";
 echo " <td>" . $row1['tel_numero'] . "</td>";
 echo " <td>" . $row1['tel_tipo'] . "</td>";
 echo " <td>" . $row1['tel_operadora'] . "</td>";

 
    /*if($result->num_rows > 0 ){

            $result->data_seek(0);
            $row = $result->fetch_row();

            echo " <td>" . $row['usu_cedula'] . "</td>";
            echo " <td>" . $row['usu_nombres'] ."</td>";
            echo " <td>" . $row['usu_apellidos'] . "</td>";
            echo " <td>" . $row['usu_correo'] . "</td>";
            echo " <td>" . $row['usu_rol'] . "</td>";

            <th>Cedula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Correo</th>
            <th>Rol</th>
            <th>Telefono</th>
            <th>Tipo</th>
            <th>Operadora</th>
        
    }*/
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