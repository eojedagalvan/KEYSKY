const login_form = document.getElementById('form-modificar');
const campos = document.getElementsByClassName('campo');
const boton = document.getElementById('modificar');
const confirmar = document.getElementById('confirmar');
const error = document.querySelector('.error');
const tel = document.getElementById('tel');
const nombre = document.getElementById('nombre');
const apellido = document.getElementById('apellido');

window.addEventListener("load", function() {
  tel.addEventListener("keypress", soloNumeros, false);
  nombre.addEventListener("keypress", soloLetras, false);
  apellido.addEventListener("keypress", soloLetras, false);
});

//Solo permite introducir numeros.
function soloNumeros(e){
  var key = window.event ? e.which : e.keyCode;
  if (key < 48 || key > 57) {
    e.preventDefault();
  }
}

function soloLetras(e){
  var key = window.event ? e.which : e.keyCode;
  if (!(key < 48 || key > 57)) {
    e.preventDefault();
  }
}

login_form.addEventListener("click", function (evento) {
  evento.preventDefault();
  for (i = 0; i < campos.length; i++) {
    campos[i].disabled = false;
  }
  boton.classList.add('hide');
  confirmar.classList.remove('hide');
});


function guardarCambios() {

  const nombre = document.querySelector("#nombre").value;
  const apellido = document.querySelector("#apellido").value;
  const correo = document.querySelector("#correo").value;
  const clave = document.querySelector("#clave").value;
  const tel = document.querySelector("#tel").value;

  if (!validarInformacion(nombre, apellido, correo, clave, tel)) return;

  // const formData = new FormData();
  // formData.append("correo", correo);
  // formData.append("clave", clave);
  //
  // axios
  // .post("php/validarUsuario.php", formData)
  // .then(function (respuesta) {
  //   // alert(respuesta.data);
  //   document.location.href= '../php/inicio.php';
  // })
  // .catch(function () {
  //   error.classList.remove("hide");
  //   loginForm.classList.add("login-box-error");
  //   error.innerText = "Usuario o contraseña incorrectos";
  // });
}

function validarInformacion(nombre, apellido, correo, clave, tel) {
  var expresion;
  expresion = /\w+@\w+\.+[a-z]/;

  if (correo === "" || clave === "" || nombre === "" || apellido === "" || tel === "") {
      error.classList.remove("hide");
      error.innerText = "Todos los campos son obligatorios";
      return false;
  } else if (correo.length > 50) {
      error.classList.remove("hide");
      error.innerText = "El correo es muy largo";
      return false;
  } else if (!expresion.test(correo)) {
      error.classList.remove("hide");
      error.innerText = "El correo no es válido";
      return false;
  } else if (clave.length < 8 || clave.length > 16) {
      error.classList.remove("hide");
      error.innerText = "La contraseña debe de ser entre 8 - 16 caracteres";
      return false;
  } else if (tel === []){

  }

  return true;
}
