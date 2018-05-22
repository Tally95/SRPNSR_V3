

//                        function capturar(){
//                            var porId = document.getElementById("selectAreaSilvestre").value;
//                            document.getElementById("impri").innerHTML="Por id: "+porId;
//                        }


function cargarEstaciones(dato) {

    if (dato == "Parque Nacional Santa Rosa") {
        document.getElementById("parqueSelect").value = "1";

    } else if (dato == "Parque Nacional Guanacaste") {
        document.getElementById("parqueSelect").value = "2";
    } else if (dato == "") {
        document.getElementById("parqueSelect").value = "0";

    }
}

var servi;

function cualSelectServi(dato) {

    if (dato == 1) {
        servi = "cuartos";
        document.getElementById("entradaServi").innerHTML = '<option>Selecione...</option><option value="1">Adulto(s)</option><option value="2">Niño(s)</option><option value="3">Adultos(s) Extranjero(s)</option> <option value="4">Niño(s) Extranjero(s)</option>';
    } else if (dato == 2) {
        servi = "laboratorio";
        document.getElementById("entradaServi").innerHTML = '<option>Selecione...</option><option value="1">Nacional</option><option value="2">Extranjero</option>';
    } else if (dato == 3) {
        servi = "lavanderia";
        document.getElementById("entradaServi").innerHTML = '<option>Selecione...</option><option value="1">Adulto(s)</option> <option value="2">Niño(s)</option><option value="3">Adultos(s) Extranjero(s)</option> <option value="4">Niño(s) Extranjero(s)</option>';
    } else if (dato == 4) {
        servi = "senderos";
        document.getElementById("entradaServi").innerHTML = '<option>Selecione...</option><option value="1">Adulto(s)</option> <option value="2">Niño(s)</option><option value="3">Adultos(s) Extranjero(s)</option> <option value="4">Niño(s) Extranjero(s)</option>';
    } else if (dato == 5) {
        servi = "charlas";
        document.getElementById("entradaServi").innerHTML = '<option>Selecione...</option><option value="1">Adulto(s)</option> <option value="2">Niño(s)</option><option value="3">Adultos(s) Extranjero(s)</option> <option value="4">Niño(s) Extranjero(s)</option>';
    } else if (dato == 6) {
        servi = "alimenta";
        document.getElementById("entradaServi").innerHTML = '<option>Selecione...</option><option value="1">Nacional</option><option value="2">Extranjero</option>';
        document.getElementById("disponi").innerHTML = '<option>Selecione...</option><option value="d">Desayuno</option><option value="a">Almuerzo</option><option value="c">Cena</option><option value="dya">Desayuno y Almuerzo</option><option value="dyc">Desayuno y Cena</option><option value="ayc">Almuerzo y Cena</option><option value="dayc">Desayuno, Almuerzo y Cena</option>';
    } else if (dato == 7) {
        servi = "aulaConfe";
        document.getElementById("entradaServi").innerHTML = '<option>Selecione...</option><option value="1">Nacional</option><option value="2">Extranjero</option>';
    }else if (dato == 0) {
        document.getElementById("entradaServi").innerHTML = "<option>Selecione un Servicio...</option>";
    }
    cualSelectAdmisi(1);
}

var precioServi =0;
function cualSelectAdmisi(dato) {
    if (servi == "cuartos"){
        
    } else if (servi == "laboratorio"){
        
    } else if (servi == "lavanderia"){
        
    } else if (servi == "senderos"){
        
    } else if (servi == "charlas"){
        
    } else if (servi == "alimenta"){
        if (dato == 1){
            precioServi = 1200;
            document.getElementById("totalParci").innerHTML = precioServi;
        }else if(dato == 2){
            precioServi = 8;
            document.getElementById("totalParci").innerHTML = precioServi;
        }
    } else if (servi == "aulaConfe"){
        
    }  
    calcuDisponi(dato);
}


var precioDisponi=0;
var cantC = 1;
function calcuDisponi(dato){
    if (dato=="d" ||dato=="a"||dato=="cena"){
        precioDisponi = precioServi;
        cantC = 1;
        document.getElementById("totalParci").innerHTML = precioDisponi;
    }else if (dato == "dya"||dato == "dyc"||dato == "ayc"){
        precioDisponi = precioServi*2;
        cantC = 2;
        document.getElementById("totalParci").innerHTML = precioDisponi;
    }else if (dato == "dayc"){
        precioDisponi = precioServi*3;
        cantC = 3;
        document.getElementById("totalParci").innerHTML = precioDisponi;
    }
    calcSubtotalServi(cantC);
}

var subTotalServi = 0;
function calcSubtotalServi(cant) {
    subTotalServi = precioDisponi * cant;
    document.getElementById("totalParci").innerHTML = subTotalServi;


}
//                                function mensaje(dato) {
//                                    if (dato == 1) {
//                                        alert("Esta selecionado el " + dato);
//                                    }
//
// }


var precio = 1000;
var isExtran = true;
var cant = 1;

function precioPor(entrada) {



    if (entrada == 1) {
        precio = 1000;
        isExtran = false;
        document.getElementById("precioEntrada").innerHTML = "₡" + precio;
    } else if (entrada == 2) {
        precio = 1000;
        isExtran = false;
        document.getElementById("precioEntrada").innerHTML = "₡" + precio;
    } else if (entrada == "Niña(s)") {
        isExtran = false;
        precio = 500;
        document.getElementById("precioEntrada").innerHTML = "₡" + precio;
    } else if (entrada == "Niño(s)") {
        isExtran = false;
        precio = 500;
        document.getElementById("precioEntrada").innerHTML = "₡" + precio;
    } else if (entrada == "Mujer(es) Extranjera(s)") {
        isExtran = true;
        precio = 20;
        document.getElementById("precioEntrada").innerHTML = "$" + precio;
    } else if (entrada == "Hombre(s) Extranjero(s)") {
        isExtran = true;
        precio = 20;
        document.getElementById("precioEntrada").innerHTML = "$" + precio;
    } else if (entrada == "Niña(s) Extranjera(s)") {
        isExtran = true;
        precio = 10;
        document.getElementById("precioEntrada").innerHTML = "$" + precio;
    }else if (entrada == 8) {
        isExtran = true;
        precio = 10;
        document.getElementById("precioEntrada").innerHTML = "$" + precio;
    }
    
//    if (entrada == 3) {
//        isExtran = false;
//        precio = 100;
//        document.getElementById("precioEntrada").innerHTML = "₡" + precio;
//    } else
    calcSubtotal(cant);
}

function calcSubtotal(cant1) {
    cant = cant1;
    
    var subTotal = cant * precio;
    if (isExtran) {
        document.getElementById("subTotalEntrada").innerHTML = "$" + subTotal;
    } else {
        document.getElementById("subTotalEntrada").innerHTML = "₡" + subTotal;
    }
}
