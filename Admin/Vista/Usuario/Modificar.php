<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Modificar datos de persona</title>
</head>
<body>
 <?php
 session_start();
 if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
    header("Location: /ProyectoWeb/ProyectoWeb/public/VIsta/Login.html");
 }
 $codigo = $_GET["codigo"];
 $sql = "SELECT * FROM usuario where usu_codigo=$codigo";
 include '../../../config/conexionBD.php';
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {

 while($row = $result->fetch_assoc()) {
 ?>
 <form id="formulario01" method="POST" action="../../Controladores/Usuario/Modificar.php">

 <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
 <label for="cedula">Cedula (*)</label>
 <input type="text" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>"
required placeholder="Ingrese la cedula ..."/>
 <br>
 <label for="nombres">Nombres (*)</label>
 <input type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombres"];
?>" required placeholder="Ingrese los dos nombres ..."/>
<br>
 <label for="apellidos">Apelidos (*)</label>
 <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellidos"];
?>" required placeholder="Ingrese los dos apellidos ..."/>
 
 <br>
 <label for="correo">Correo electrónico (*)</label>
 <input type="email" id="correo" name="correo" value="<?php echo $row["usu_correo"]; ?>"
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