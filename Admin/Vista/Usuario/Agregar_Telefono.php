<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Modificar Telefono</title>
</head>
<body>
 <?php
 session_start();
 if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
    header("Location: /ProyectoWeb/ProyectoWeb/public/VIsta/Login.html");
 }
 $codigo = $_GET["codigo"];
 $sql = "SELECT * FROM telefono where tel_codigo=$codigo";
 include '../../../config/conexionBD.php';
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {

 while($row = $result->fetch_assoc()) {
 ?>
 <form id="formulario01" method="POST" action="../../Controladores/Usuario/Modificar_Telefono.php">

 <label for="cedula">Numero (*)</label>
 <input type="text" id="telefono" name="telefono" required placeholder="Ingrese el numero telefonico ..."/>
 <br>
 <label for="nombres">Tipo (*)</label>
 <input type="text" id="tipo" name="tipo" required placeholder="Ingrese el tipo de telefono ..."/>
<br>
 <label for="apellidos">Operadora (*)</label>
 <input type="text" id="operadora" name="operadora"  required placeholder="Ingrese la operadora ..."/>
 
 <br>
 
 <input type="hidden" id="correo" name="correo" value="<?php echo $row["usu_correo"]; ?>"
required placeholder="Ingrese el correo electrónico ..."/>
 <br>

 <input type="submit" id="modificar" name="modificar" value="Modificar" />
 <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
 </form>
 <?php
 }
 } else {
 echo "<p>Ha ocurrido un error inesperado !</p>";
 echo "<p>" . mysqli_error($conn) . "</p>";
 }
 $conn->close();
 ?> 
 </body>
</html>