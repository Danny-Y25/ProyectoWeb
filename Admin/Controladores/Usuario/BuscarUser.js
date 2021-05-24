function buscarPorCedula() {
    var cedula = document.getElementById("cedula").value;
    var correo = document.getElementById("correo").value;

    if (cedula == "") {
    document.getElementById("informacion").innerHTML = "";
   

    } else {
        //alert("entro cedula");
    if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    
    document.getElementById("informacion").innerHTML = this.responseText;
    }
    };
    xmlhttp.open("GET","../../Controladores/Usuario/BuscarUser.php?cedula="+cedula,true);
    xmlhttp.send();
    }


    if(correo == ""){
        document.getElementById("informacion").innerHTML = "";
   

    } else {
        //alert("entro correo");
    if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    
    document.getElementById("informacion").innerHTML = this.responseText;
    }
    };
    
    xmlhttp.open("GET","../../Controladores/Usuario/BuscarCorreo.php?correo="+correo,true);
    xmlhttp.send();  
    }
    return false;
}