function ConvertirStringToDate(fechaString)
{
var fechas = fechaString.split('-');
if (fechas.length != 3)
    fecha = fechaString.split('/');

var tipoDate = new Date(fechas[2], fechas[1], fechas[0]);

return tipoDate;
}

function ValidarFiltroDeFechas(stringFechaDesde, stringFechaHasta) {

    stringFechaDesde=document.getElementById(stringFechaDesde).value;
    stringFechaHasta=document.getElementById(stringFechaHasta).value;

    Validador = { Estado: true, Mensaje: '' };

    if (stringFechaDesde == "") {
        alert("Debe ingresar una fecha de llegada.");
        return false;
    }

    if (stringFechaHasta == "") {
        alert("Debe ingresar una fecha de salida.");
        return false;
    }

    var dateDesde = ConvertirStringToDate(stringFechaDesde);
    var dateHasta = ConvertirStringToDate(stringFechaHasta);

    if (dateDesde < dateHasta) {
        alert("La fecha de salida no puede ser mayor a la de llegada");
        return false;
    }
}
