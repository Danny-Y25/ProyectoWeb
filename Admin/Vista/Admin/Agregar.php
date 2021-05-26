<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <script type="text/javascript" src="../../../Public/Controladores/ValidacionRegistrar.js"></script>
	<title>Registrar usuario</title>
    <style type="text/css">
        .error {
            color: red;
            font-size: 8px;
        }
    </style>
</head>
<body>
<?php
session_start();
$valor_rol=$_SESSION['rol'];
 /*echo($valor_rol);
 if($valor_rol == "ADMIN"){
   echo("denegado");
 }*/
 if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE || $valor_rol == "USER") {
    header("Location: /ProyectoWeb/ProyectoWeb/public/VIsta/Login.html");
 }
 ?>	
	
		<form id="formulario01"  method="POST" action="../../../Admin/Controladores/Admin/Agregar.php" onsubmit="return validarCamposObligatorios()">
            
			<!-- Grupo: Cedula -->
			<div class="formulario__grupo" id="grupo__cedula">
				<label for="cedula" class="formulario__label">Cédula</label>
				<div class="formulario__grupo-input">
					<input type="text"  name="cedula" id="cedula" placeholder=""
                    onkeyup="return validarCedula(this)"/>
				</div>
                <span id="mensajeCedula" class="error"></span>
				
			</div>

			<!-- Grupo: Nombres -->
			<div class="formulario__grupo" id="grupo__nombre">
				<label for="nombres" class="formulario__label">Nombre</label>
				<div class="formulario__grupo-input">
					<input type="text"  name="nombres" id="nombres" placeholder=""
                    onkeyup="return validarLetras(this)"/>
					
				</div>
                <span id="mensajeNombres" class="error"></span>
				
			</div>

            <!-- Grupo: Apellidos -->
			<div class="formulario__grupo" id="grupo__apellidos">
				<label for="apellidos" class="formulario__label">Apellidos</label>
				<div class="formulario__grupo-input">
					<input type="text"  name="apellidos" id="apellidos" placeholder=""
                    onkeyup="return validarApellidos(this)"/>
					
				</div>
                <span id="mensajeApellidos" class="error"></span>
				
			</div>
			

            <!-- Grupo: Correo Electronico -->
			<div class="formulario__grupo" id="grupo__correo">
				<label for="correo" class="formulario__label">Correo Electrónico</label>
				<div class="formulario__grupo-input">
					<input type="email"  name="correo" id="correo" placeholder=""
                    onkeyup="return validarCorreo(this)"/>
					
				</div>
                <span id="mensajeCorreo" class="error"></span>
				
			</div>

            <!-- Grupo: Contraseña -->
			<div class="formulario__grupo" id="grupo__password">
				<label for="password" class="formulario__label">Contraseña</label>
				<div class="formulario__grupo-input">
					<input type="password"  name="contrasena" id="contrasena" placeholder=""
                    onkeyup="return validarContrasena(this)"/>
					
				</div>
                <span id="mensajeContrasena" class="error"></span>
				
			</div>


            <!-- Grupo: TIpo Teléfono -->
			<div class="formulario__grupo" id="grupo__tipo">
				<label for="tipo" class="formulario__label">Tipo de Teléfono</label>
				<div class="formulario__grupo-input">
					<input type="text"  name="tipo" id="tipo" placeholder=""
                    onkeyup="return validarCorreo(this)"/>
					
				</div>
                <span id="mensajeTipo" class="error"></span>
				
			</div>

			<!-- Grupo: Teléfono -->
			<div class="formulario__grupo" id="grupo__telefono">
				<label for="telefono" class="formulario__label">Teléfono</label>
				<div class="formulario__grupo-input">
					<input type="text" name="telefono" id="telefono" placeholder=""
                    onkeyup="return validarTelefono(this)"/>
					
				</div>
                <span id="mensajeTelefono" class="error"></span>
				
			</div>

            <!-- Grupo: Operadora -->
			<div class="formulario__grupo" id="grupo__Operadora">
				<label for="Operadora" class="formulario__label">Operadora</label>
				<div class="formulario__grupo-input">
					<input type="text"  name="operadora" id="operadora" placeholder=""
                    onkeyup="return validarCorreo(this)"/>
					
				</div>
                <span id="mensajeOperadora" class="error"></span>
				
			</div>

             <!-- Grupo: Rol -->
			<div class="formulario__grupo" id="grupo__Operadora">
				
				<div class="formulario__grupo-input">
					<input type="hidden"  name="rol" id="rol" value="user">
					
				</div>
                
				
			</div>
            

			<!-- Grupo: Terminos y Condiciones -->
			<div class="formulario__grupo" id="grupo__terminos">
				<label class="formulario__label">
					<input class="formulario__checkbox" type="checkbox" name="terminos" id="terminos">
					Acepto los Terminos y Condiciones
				</label>
			</div>

			<input type="submit" id="crear" name="crear" value="Aceptar" />
            <input  type="reset" id="cancelar" name="cancelar" value="Cancelar" />
			<input  type="button" onclick="location.href='MenuAdmin.php'" id="regresar" name="regresar" value="Regresar" />

		</form>
	

	
	
</body>
</html>