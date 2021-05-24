<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Eliminar datos de persona</title>
</head>
<body>
 <?php

session_start();
if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
header("Location: /SistemaDeGestion/public/vista/login.html");
}

 $codigo = $_GET["codigo"];
 $sql = "SELECT * FROM usuario u, telefono t where u.usu_cedula=t.usu_cedula andu.usu_codigo=$codigo";

 include '../../../Config/conexionBD.php';
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {

 while($row = $result->fetch_assoc()) {
 ?>
 <form id="formulario01" method="POST" action="../../Controladores/Usuario/Eliminar.php">
 <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
 <label for="cedula">Cedula (*)</label>
 <input type="text" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>"
disabled/>
 <br>
 <label for="nombres">Nombres (*)</label>
 <input type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombres"];
?>" disabled/>
 <br>
 <label for="apellidos">Apelidos (*)</label>
 <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellidos"];
?>" disabled/>
 <br>
 <label for="correo">Correo electrónico (*)</label>
 <input type="email" id="correo" name="correo" value="<?php echo $row["usu_correo"]; ?>"
disabled/>
 <br>
 <label for="direccion">Telefono (*)</label>
 <input type="text" id="telefono" name="telefono" value="<?php echo $row["tel_numero"];
?>" disabled/>
 <br>
 <label for="telefono">Tipo (*)</label>
 <input type="text" id="tipo" name="tipo" value="<?php echo $row["tel_tipo"];
?>" disabled/>
 <br>
 <label for="fecha">Operadora (*)</label>
 <input type="date" id="operadora" name="operadora" value="<?php echo
$row["tel_operadora"]; ?>" disabled/>
 <br>
 
 

 <input type="submit" id="eliminar" name="eliminar" value="Eliminar" />
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
