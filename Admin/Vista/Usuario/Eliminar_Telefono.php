<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Eliminar Telefono</title>
</head>
<body>
 <?php

session_start();
if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
    header("Location: /ProyectoWeb/ProyectoWeb/public/VIsta/Login.html");
}

 $codigo = $_GET["codigo"];
 $sql = "SELECT * FROM telefono  where tel_codigo=$codigo";

 include '../../../Config/conexionBD.php';
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {

 while($row = $result->fetch_assoc()) {
 ?>
 <form id="formulario01" method="POST" action="../../Controladores/Usuario/Eliminar_Telefono.php">
 <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
 <label for="cedula">Numero (*)</label>
 <input type="text" id="telefono" name="telefono" value="<?php echo $row["tel_numero"]; ?>"
required disabled/>
 <br>
 <label for="nombres">Tipo (*)</label>
 <input type="text" id="tipo" name="tipo" value="<?php echo $row["tel_tipo"];
?>" disabled/>
<br>
 <label for="apellidos">Operadora (*)</label>
 <input type="text" id="operadora" name="operadora" value="<?php echo $row["tel_operadora"];
?>" disabled/>
 
 <br>
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
