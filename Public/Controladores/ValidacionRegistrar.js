function validarCamposObligatorios() {
	var bandera = true;
	for (var i = 0; i < document.forms[0].elements.length; i++) {
	  var elemento = document.forms[0].elements[i];
	  if (elemento.value == "" && elemento.type == "text") {
		if (elemento.id == "cedula") {
		  document.getElementById("mensajeCedula").innerHTML =
			"<br>La cedula esta vacia";
		}
		if (elemento.id == "nombres") {
		  document.getElementById("mensajeNombres").innerHTML =
			"<br>Los nombres estan vacios";
		}
		if (elemento.id == "apellidos") {
		  document.getElementById("mensajeApellidos").innerHTML =
			"<br>Los apellidos estan vacios";
		}
		if (elemento.id == "operadora") {
		  document.getElementById("mensajeOperadora").innerHTML =
			"<br>La Operadora esta vacia";
		}
		if (elemento.id == "telefono") {
		  document.getElementById("mensajeTelefono").innerHTML =
			"<br>El telefono esta vacio";
		}
		if (elemento.id == "tipo") {
		  document.getElementById("mensajeTipo").innerHTML =
			"<br>EL tipo de Telefono esta vacia";
		}
		if (elemento.id == "correo") {
		  document.getElementById("mensajeCorreo").innerHTML =
			"<br>El correo esta vacio";
		}
		if (elemento.id == "contrasena") {
		  document.getElementById("mensajeContrasena").innerHTML =
			"<br>La contrasena esta vacia";
		}
  
		elemento.style.border = "1px red solid";
		elemento.className = "error";
		bandera = false;
	  }
	}
  
	var expresion = /\w+@+ups.edu.ec/;
	var expresion1 = /\w+@+est.ups.edu.ec/;
  
	var correo = document.getElementById("correo").value;
	if (!expresion.test(correo)) {
	  if (!expresion1.test(correo)) {
		document.getElementById("mensajeCorreo").innerHTML =
		  "<br>El correo es invalido";
		bandera = false;
	  }else if(correo.value.length<0){
		elemento.style.border = "1px black solid";
	  }
	}
  
	var cedula = document.getElementById("cedula").value;
	if (isNaN(cedula)) {
	  document.getElementById("mensajeCedula").innerHTML =
		"<br>Ingrese solo numeros enteros";
	  bandera = false;
	}
  
	if (!bandera) {
	  alert("Error: revisar los comentarios");
	} else {
	  alert("Bienvenido pasaste las validaciones");
	}
	return bandera;
  }
  bandera2 = true;
  function validarLetras(elemento) {
	if (elemento.value.length > 0) {
	  var miAscii = elemento.value.charCodeAt(elemento.value.length - 1);
  
	  if (bandera2 == true) {
		if (
		  (miAscii >= 97 && miAscii <= 122) ||
		  miAscii == 32 ||
		  (miAscii >= 65 && miAscii <= 90)
		) {
		  var x = event.keyCode;
		  document.getElementById("mensajeNombres").innerHTML =
			"<br>Ingrese 2 nombres";
		  if (x == 32) {
			document.getElementById("mensajeNombres").innerHTML = "";
			bandera2 = false;
		  }
		  return true;
		} else {
		  elemento.value = elemento.value.substring(0, elemento.value.length - 1);
  
		  return false;
		}
	  } else if (bandera2 == false) {
		if (
		  (miAscii >= 97 && miAscii <= 122) ||
		  (miAscii >= 65 && miAscii <= 90)
		) {
		  document.getElementById("mensajeNombres").innerHTML = "";
		  elemento.style.border = "1px blue solid";
		  return true;
		} else {
		  elemento.value = elemento.value.substring(0, elemento.value.length - 1);
  
		  return false;
		}
	  }
	} else {
	  document.getElementById("mensajeNombres").innerHTML = "";
	  bandera2 = true;
	  return true;
	}
  }
  
  function validarCedula(elemento) {
	if (elemento.value.length > 0) {
	  var miAscii = elemento.value.charCodeAt(elemento.value.length - 1);
	  console.log(miAscii);
	  if (miAscii >= 48 && miAscii <= 57) {
		var cad = elemento.value;
		var total = 0;
		var longitud = cad.length;
		var longcheck = longitud - 1;
  
		if (cad !== "" && longitud === 10) {
		  for (i = 0; i < longcheck; i++) {
			if (i % 2 === 0) {
			  var aux = cad.charAt(i) * 2;
			  if (aux > 9) aux -= 9;
			  total += aux;
			} else {
			  total += parseInt(cad.charAt(i));
			}
		  }
  
		  total = total % 10 ? 10 - (total % 10) : 0;
  
		  if (cad.charAt(longitud - 1) == total) {
			elemento.className = "correcto";
			elemento.style.border = "1px blue solid";
		  } else {
			elemento.style.border = "1px red solid";
			elemento.className = "error";
		  }
		} else {
		  elemento.style.border = "1px red solid";
		  elemento.className = "error";
		}
		return true;
	  } else {
		elemento.value = elemento.value.substring(0, elemento.value.length - 1);
		return false;
	  }
	} else {
	  return true;
	}
  }
  
  function validarCorreo(elemento) {
	if (elemento.value.length > 0) {
	  var expresion = /\w+@+ups.edu.ec/;
	  var expresion1 = /\w+@+est.ups.edu.ec/;
	  var correo = document.getElementById("correo").value;
	  if (!expresion.test(correo)) {
		if (!expresion1.test(correo)) {
		  bandera = false;
		  elemento.style.border = "1px red solid";
		  document.getElementById("mensajeCorreo").innerHTML =
			"<br>El correo es invalido, use @ups.edu.ec o @est.ups.edu.ec";
		} else {
		  bandera = true;
		  elemento.style.border = "1px blue solid";
		  document.getElementById("mensajeCorreo").innerHTML = "";
		}
	  } else {
		document.getElementById("mensajeCorreo").innerHTML = "";
		bandera = true;
		elemento.style.border = "1px blue solid";
	  }
	} else {
	  document.getElementById("mensajeCorreo").innerHTML = "";
	  elemento.style.border = "1px black solid";
	  return true;
	}
  }
  
  function validarTelefono(elemento) {
	if (elemento.value.length > 0) {
	  var telefono = document.getElementById("telefono").value;
	  if (isNaN(telefono) || elemento.value.length > 10) {
		document.getElementById("mensajeTelefono").innerHTML =
		  "<br>Ingrese numeros enteros";
		elemento.style.border = "1px red solid";
		bandera = false;
	  } else {
		elemento.style.border = "1px blue solid";
		bandera = true;
		document.getElementById("mensajeTelefono").innerHTML = "";
	  }
	} else {
	  elemento.style.border = "1px black solid";
	  document.getElementById("mensajeTelefono").innerHTML = "";
	  return true;
	}
  }
  
  function validarFecha(elemento) {
	var fecha = elemento.value;
	if (fecha.length === 10) {
	  var dd = fecha.substring(0, 2);
	  var mm = fecha.substring(3, 5);
	  fecha = fecha.substring(6, fecha.length);
	  var comp = new Date(dd, mm, fecha);
	  if (!isNaN(comp)) {
		elemento.style.border = "1px black solid";
		elemento.className = "correcto";
	  } else {
		elemento.style.border = "1px red solid";
		elemento.className = "error";
	  }
	} else {
	  elemento.style.border = "1px red solid";
	  elemento.className = "error";
	}
  }
  
  function validarApellidos(elemento) {
	if (elemento.value.length > 0) {
	  var miAscii = elemento.value.charCodeAt(elemento.value.length - 1);
  
	  if (bandera2 == true) {
		if (
		  (miAscii >= 97 && miAscii <= 122) ||
		  miAscii == 32 ||
		  (miAscii >= 65 && miAscii <= 90)
		) {
		  var x = event.keyCode;
		  document.getElementById("mensajeApellidos").innerHTML =
			"<br>Ingrese 2 nombres";
		  if (x == 32) {
			document.getElementById("mensajeApellidos").innerHTML = "";
			bandera2 = false;
		  }
		  return true;
		} else {
		  elemento.value = elemento.value.substring(0, elemento.value.length - 1);
  
		  return false;
		}
	  } else if (bandera2 == false) {
		if (
		  (miAscii >= 97 && miAscii <= 122) ||
		  (miAscii >= 65 && miAscii <= 90)
		) {
		  document.getElementById("mensajeApellidos").innerHTML = "";
		  elemento.style.border = "1px blue solid";
		  return true;
		} else {
		  elemento.value = elemento.value.substring(0, elemento.value.length - 1);
  
		  return false;
		}
	  }
	} else {
	  document.getElementById("mensajeApellidos").innerHTML = "";
	  bandera2 = true;
	  return true;
	}
  }
  
  function validarContrasena(elemento) {
	var CE = false;
	var CM = false;
	var CMi = false;
	var contra = elemento.value;
  
	if (contra.length >= 8) {
	  for (i = 0; i < contra.length; i++) {
		var car = contra.charCodeAt(i);
		console.log(car);
  
		if ((car == 95 || car == 64 || car == 36) && !CE) {
		  CE = true;
		} else if (car >= 65 && car <= 90 && !CM) {
		  CM = true;
		} else if (car >= 97 && car <= 122 && !CMi) {
		  CMi = true;
		}
	  }
  
	  if (CMi == false) {
		elemento.style.border = "1px red solid";
  
		document.getElementById("mensajeContrasena").innerHTML =
		  "<br> No esta poniendo minusculas";
	  }
	  if (CM == false) {
		elemento.style.border = "1px red solid";
  
		document.getElementById("mensajeContrasena").innerHTML =
		  "<br> No esta poniendo mayusculas";
	  }
	  if (CE == false) {
		elemento.style.border = "1px red solid";
		document.getElementById("mensajeContrasena").innerHTML =
		  "<br> No esta con caracter especial";
	  }
	} else {
	  document.getElementById("mensajeContrasena").innerHTML =
		"<br> Debe tener al minimo 8 caracteres";
	}
  
	if (CE == true && CM == true && CMi == true) {
	  document.getElementById("mensajeContrasena").innerHTML = "";
	  elemento.style.border = "1px blue solid";
  
	  return true;
	}
  }
  