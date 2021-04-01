const formulario = document.querySelector("#buscar");
const stringFechaDesde = document.querySelector('#fechaInicio');
const stringFechaHasta = document.querySelector('#fechaTermino');

function ConvertirStringToDate(fechaString)
{
var fechas = fechaString.split('-');
if (fechas.length != 3)
    fecha = fechaString.split('/');

var tipoDate = new Date(fechas[2], fechas[1], fechas[0]);

return tipoDate;
}

function ValidarFiltroDeFechas() {

    // stringFechaDesde=document.getElementById(stringFechaDesde).value;
    // stringFechaHasta=document.getElementById(stringFechaHasta).value;

    validador = { Estado: true, Mensaje: '' };
    var dateDesde = ConvertirStringToDate(stringFechaDesde.value);
    var dateHasta = ConvertirStringToDate(stringFechaHasta.value);

    if (stringFechaDesde.value == "") {
        alert("Debe ingresar una fecha de llegada.");
        return false;
    }else if(stringFechaHasta.value == "") {
        alert("Debe ingresar una fecha de salida.");
        return false;
    }else if(dateDesde > dateHasta) {
        alert("La fecha de salida no puede ser mayor a la de llegada");
        return false;
    }
    return true;
}

formulario.addEventListener("submit", function (evento) {
    evento.preventDefault();
    if(!ValidarFiltroDeFechas()) return;
    document.location.href= '../php/busqueda.php';
});
