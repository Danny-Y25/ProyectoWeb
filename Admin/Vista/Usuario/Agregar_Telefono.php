<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Modificar Telefono</title>
</head>
<body  style="background-color:#094f77;">
   
   <img src="../../../imagenes/banner.jpg" width="100%" alt="">
 <?php
 session_start();
 if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
    header("Location: /ProyectoWeb/ProyectoWeb/public/VIsta/Login.html");
 }
 $codigo = $_GET["codigo"];

 ?>
 <form id="formulario01" method="POST" action="../../Controladores/Usuario/Agregar_Telefono.php">

 <label for="cedula">Numero (*)</label>
 <input type="text" id="telefono" name="telefono" required placeholder="Ingrese el numero telefonico ..."/>
 <br>
 <label for="nombres">Tipo (*)</label>
 <input type="text" id="tipo" name="tipo" required placeholder="Ingrese el tipo de telefono ..."/>
<br>
 <label for="apellidos">Operadora (*)</label>
 <input type="text" id="operadora" name="operadora"  required placeholder="Ingrese la operadora ..."/>
 
 <br>
 
 <input type="hidden" id="correo" name="correo" value="<?php echo $codigo; ?>"
required placeholder="Ingrese el correo electrónico ..."/>
 <br>

 <input type="submit" id="modificar" name="modificar" value="Aceptar" />
 <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
 </form>
 <?php

 ?> 
 </body>
</html>