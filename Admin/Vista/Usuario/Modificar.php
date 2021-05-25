<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Modificar datos de persona</title>
 <link rel="stylesheet" type="text/css" href="../../../Public/Controladores/CSS/reglas.css"/>
    
   <link rel="stylesheet" type="text/css" href="../../../Public/Controladores/CSS/index.css"/>
</head>
<body  style="background-color:#094f77;">
   
   <img src="../../../imagenes/banner.jpg" width="100%" alt="">
   <h1>Modificar</h1>
 <?php
 session_start();
 $valor_rol=$_SESSION['rol'];
 /*echo($valor_rol);
 if($valor_rol == "ADMIN"){
   echo("denegado");
 }*/
 if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE || $valor_rol == "ADMIN") {
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
 <input type="hidden" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>"
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
 <input type="hidden" id="correo" name="correo" value="<?php echo $row["usu_correo"]; ?>"
 />
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