<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
    <script type="text/javascript" src="../Controladores/Buscar.js"></script>
    <title> Menu</title>
    
    
    <link rel="stylesheet" type="text/css" href="../Controladores/CSS/reglas.css"/>
    
    <link rel="stylesheet" type="text/css" href="../Controladores/CSS/index.css"/>
    
    <link rel="stylesheet" type="text/css" href="../Controladores/CSS/2-columnas.css"/>
    
</head>

<body  style="background-color:#094f77;">
    <header>
        <img src="../../imagenes/banner.jpg" alt="">

        <div style="text-align: center;"></div>
            <button onclick="location.href='Login.html'" style="position: relative;top: 10px;left: 1110px; width: 90px; height: 30px;">Iniciar sesion</button>
            <button onclick="location.href='Registrar.html'" style="position: relative;top: 10px;left: 1120px; width: 90px; height: 30px;">Registrarse</button>
        </div>
        <h1>Guia telefonica</h1>
    </header>
    <section>
        <article style="background-color: aliceblue;">
    
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
                    <input type="text"  name="correo" id="correo" placeholder="" style="margin-left: 15px;"
                    />
                </div>
                <br>
                
                <input type="button" id="buscar" name="buscar" value="Buscar" onclick="buscarPorCedula()">
                
            </form>

            
                
        </aside>
    </section>

    <section >
        <Article>

        </Article>

    </section>

    
    
    <footer>
        <table>
            <tr>
                <td>
                    <p>Danny Gustavo Yunga Yunga</p>
                    <p>Universidad Politécnica Salesiana</p>
                    &copy; Todos los Derechos Resrvados <br/>
                </td>
                <td>
                    <p>Call: <a href="tel:+59350985103603">(593) 0985103603</a></p>
                    <p>Email: <a href="mailto:dannyy25000@gmail.com">dannyy25000@gmail.com</a></p>

                </td>
            </tr>
        </table>
        
    </footer>
    

</body>

</html>