<?php
session_start();

include '../../Config/conexionBD.php';
$usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
$contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
$sql = "SELECT * FROM usuario WHERE usu_correo = '$usuario' and usu_password = 
MD5('$contrasena')";
$result = $conn->query($sql);
if ($result-> num_rows> 0){
    $_SESSION['isLogged'] = TRUE;

    echo "<p>Se ha ingresado  los datos personales correctamemte!!!</p>";
    header("Location: ../VIsta/Registrar.html");
} else {
   echo"<p> usuario o contraseña equivocados</p>";
   
}
$conn->close();
echo "<a href='../vista/Login.html'>Regresar</a>";
?>