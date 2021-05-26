<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
    <script type="text/javascript" src="../../Controladores/Usuario/BuscarUser.js"></script>
    <title> Menu</title>
    
    
    <link rel="stylesheet" type="text/css" href="../../../Public/Controladores/CSS/reglas.css"/>
    
    <link rel="stylesheet" type="text/css" href="../../../Public/Controladores/CSS/index.css"/>
    
    <link rel="stylesheet" type="text/css" href="../../../Public/Controladores/CSS/2-columnas.css"/>
    
</head>

<body  style="background-color:#094f77;">
<?php
session_start();

$valor_rol=$_SESSION['rol'];
$cuenta=$_SESSION['correo1'];
 echo($valor_rol);
 /*if($valor_rol == "ADMIN"){
   echo("denegado");
 }*/
 if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE || $valor_rol == "ADMIN") {
    header("Location: /ProyectoWeb/ProyectoWeb/public/VIsta/Login.html");
 }
 
 ?>	
<header></header>
    <header border="10px">
        <img src="../../../imagenes/banner.jpg" alt="">

        <div style="text-align: center;"></div>
            <button style="position: relative;top: 10px;left: 1090px; width: 98px; height: 30px;"><a href='MenuUser.php?correo=<?php echo $cuenta; ?>'>Mi pagina</a></button>
            <button style="position: relative;top: 10px;left: 1100px; width: 98px; height: 30px;"><a href='../../../config/Cerrarsesion.php'>Cerrar Sesion</a></button>
        </div>
        <h1>Guia telefonica</h1>
    </header>
    <section>
        <article style="background-color: aliceblue; ">
    
            <div  id="informacion"><b></b></div>

            
        </article>
        <aside>
            <h2>
                Buscar Usuario
            </h2>

            <form action="return buscarPorCedula()">
                <p>CEDULA</p><br>
                <div >
                <input type="text" id="cedula" name="cedula" value="" style="margin-left: 15px;"/>
                </div>
                <br>
                <br>
                <p>CORREO ELECTRONICO</p><br>
                <div >
                <input type="text"  id="correo" name="correo"  value="" style="margin-left: 15px;"/>
                </div>
                <br>
                
                <input type="button" id="buscar" name="buscar" value="Buscar" onclick="buscarPorCedula()">
                
            </form>

            
                
        </aside>
    </section>

    <section >
        

    </section>

    
    
    <footer>
        <table>
            <tr>
                <td>
                    <p>Danny Yunga y Sebastian Bedoya</p>
                    <p>Universidad Politécnica Salesiana</p>
                    &copy; Todos los Derechos Resrvados <br/>
                </td>
                <td>
                   <p>Email: <a href="mailto:dannyy25000@gmail.com">dannyy25000@gmail.com</a></p>
                    <p>Call: <a href="tel:+593939889081">(593) 0939889081</a></p>
                    
                    <p>Email: <a href="mailto:sebas120720@gmail.com">sebas120720@gmail.com</a></p>
                    <p>Call: <a href="tel:+593993862284">(593) 0993862284</a></p>
                    

                </td>
                
            </tr>
        </table>
        
    </footer>
    

</body>

</html>