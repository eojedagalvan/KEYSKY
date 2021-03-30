const login_form = document.getElementById('form-modificar');
const campos = document.getElementsByClassName('campo');

login_form.addEventListener("submit", function (evento) {
  evento.preventDefault();
  for (i = 0; i < campos.length; i++) {
    campos[i].disabled = false;
    campos[i]
  }
});
