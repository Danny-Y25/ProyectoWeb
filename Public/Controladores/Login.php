<?php
 session_start();
 include '../../Config/conexionBD.php';
 $usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
 $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
 $sql = "SELECT usu_rol FROM usuario WHERE usu_correo = '$usuario' and usu_eliminado = 'N' and usu_password =
MD5('$contrasena')";
 $result = $conn->query($sql);
 
 if ($result->num_rows > 0  ) {
    $_SESSION['isLogged'] = TRUE;   
    while($row1 = $result->fetch_assoc()) {    
    $rol=$row1['usu_rol'];
    }
    if($rol == "USER"){ 
        header("Location: ../../Admin/Vista/Usuario/MenuUser.php?correo=$usuario");
        $_SESSION['rol']=$rol;
        $_SESSION['correo1']=$usuario;

    }else{
        header("Location: ../../Admin/Vista/Admin/MenuAdmin.php");
        $_SESSION['rol']=$rol;
        $_SESSION['correo1']=$usuario;
    }}else {
        header("Location: ../vista/login.html");
      
}   
    
     $conn->close();

?>