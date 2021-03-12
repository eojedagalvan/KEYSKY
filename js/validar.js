function validarUsuarioExistente() {
  var correo, contrasena, expresion;
  correo = document.getElementById("correo").value;
  clave = document.getElementById("clave").value;

expresion = /\w+@\w+\.+[a-z]/;

  if (correo === "" || clave === ""){
    alert("Todos los campos son obligatorios");
    return false;
  }
  else if (correo.length>50){
    alert("El correo es muy largo");
    return false;
  }
  else if (!expresion.test(correo)){
    alert("El correo no es válido")
    return false;
  }
  else if (clave.length<8 || clave.length>16){
    alert("La contraseña debe de ser entre 8 - 16 caracteres");
    return false;
  }

}
