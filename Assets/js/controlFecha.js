
var hoy;
var fecha = new Date();
var anio = fecha.getFullYear();
var dia = fecha.getDate();
var _mes = fecha.getMonth();
_mes = _mes + 1;
if (_mes < 10) {
    var mes = "0" + _mes;
} else {
    var mes = _mes.toString;
}

hoy = anio + '-' + mes + '-' + dia;

document.getElementById("fEntrada").min = hoy;
document.getElementById("fSalida").min = hoy;
//alert("Fecha Hoy: " + hoy);

function updateFSalida(fecha) {
    var f = new Date(fecha);
    var m;
    var d = f.getDate() + 2;
//    alert("Dia: " + d);
    var _m = f.getMonth() + 1;
//    alert("Mes: " + _m);
    var a = f.getFullYear();
//    alert("Año: " + a);

    if (_m < 10) {
        m = "0" + _m;
    } else {
        m = _m.toString;
    }

    var fechaMinSalida = a + '-' + m + '-' + d;

//    alert("Fecha seleccionada de entrada: " + fecha);
//    alert("Esta es la nueva fecha: " + fechaMinSalida);
    document.getElementById("fSalida").min = fechaMinSalida;





//    alert("est es el dia de la fecha selecionada: " +
//            f.getDate() + " y esta es la fecha completa: " + f.toDateString() );
}