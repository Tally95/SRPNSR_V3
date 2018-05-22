$(document).ready(function () {
    var cantidadPersonas = 0;
    /**
     * Funcion para añadir una nueva fila en la tabla
     */

    $("#add").click(function () {

        var numEntrada = document.getElementById("entrada").value;
        var entrada = "";
        var precio = 0;
        var simbolo = "";
        var cant = document.getElementById("cant").value;
        if (numEntrada == "Mujer(es)") {
            entrada = "Mujer(es)";
            precio = 1000;
            simbolo = "₡";
        } else if (numEntrada == "Hombre(s)") {
            entrada = "Hombre(s)";
            precio = 1000;
            simbolo = "₡";
        } else if (numEntrada == "Niña(s)") {
            entrada = "Niña(s)";
            precio = 500;
            simbolo = "₡";
        } else if (numEntrada == "Niño(s)") {
            entrada = "Niño(s)";
            precio = 500;
            simbolo = "₡";
        } else if (numEntrada == "Mujer(es) Extranjera(s)") {
            entrada = "Mujer(es) Extranjera(s)";
            precio = 20;
            simbolo = "$";
        } else if (numEntrada == "Hombre(s) Extranjero(s)") {
            entrada = "Hombre(s) Extranjero(s)";
            precio = 20;
            simbolo = "$";
        } else if (numEntrada == "Niña(s) Extranjera(s)") {
            entrada = "Niña(s) Extranjera(s)";
            precio = 10;
            simbolo = "$";
        } else if (numEntrada == "Niño(s) Extranjero(s)") {
            entrada = "Niño(s) Extranjero(s)";
            precio = 10;
            simbolo = "$";
        }
        
        ////        if (numEntrada == 3) {
//            entrada = "Estudiante(s)";
//            precio = 100;
//            simbolo = "₡";
//        } else 
//'<td name="visitante">' + simbolo + precio + '</td>' +
cantidadPersonas++;
        var nuevaFila = '<tr>' +
                '<td name="visitante'+ cantidadPersonas +'">' + entrada + '</td>' +
                '<td name="precio'+ cantidadPersonas +'">' + precio + '</td>' +
                '<td name="cantidad' + cantidadPersonas + '">' + cant + '</td>' +
                '<td name="subTotal' + cantidadPersonas + '">' + simbolo + precio * cant + '</td>' +
                '<td><button id="del" style="border-radius: 30px; width: 30px; height: 30px; padding: 0px;"><img src="img/icon/delete.png" width="100%"></button></td>' +
                '</tr>';
        $("#tabla4 tbody").append(nuevaFila);
        
//        if (cantidadPersonas == 1) {
//            var tabla = '<table id="tabla4" class="tabla1" style="margin: auto; text-align: center;">' +
//                    ' <tr class="encabezadoTabla" style="text-align: center;">' +
//                    '<th>Visitante</th>' +
//                    '<th>Cantidad</th>' +
//                    ' <th>Total</th>' +
//                    ' </tr>' +
//                    '<?php foreach ($this->modelPersona->ListarPorReservacion($_REQUEST["numReservacion"]) as $p): ?>' +
//                    ' <tr>  ' +
//                    ' <td><?php echo $p->tipo ?></td>' +
//                    ' <td><?php echo $p->cantidad ?></td>' +
//                    '  <td><?php echo $p->total ?></td>  ' +
//                    ' </tr>' +
//                    '  <?php endforeach; ?>' +
//                    ' </table>';
//
//            $("#tablaVisi").append(tabla);
//        }
        
    });
    
    // evento para eliminar la fila
    $("#tabla4").on("click", "#del", function () {
        $(this).parents("tr").remove();
        cantidadPersonas--;
    });

    $("#add3").click(function () {
        
        var servicio = document.getElementById("Servi").value;
        var servi = ""+servicio;
        var entrada = document.getElementById("entradaServi").value;
        var disponi  = document.getElementById("disponi").value;
        var precio = document.getElementById("id-tr").getElementsByTagName('td')[4].innerHTML;
        var simbolo = "";
        var cant = document.getElementById("cantServi").value;
        
        if (servicio == 1) {
            
        } else if (servicio == 2) {
            
        } else if (servicio == 3) {
            
        } else if (servicio == 4) {

        } else if (servicio == 5) {

        } else if (servicio == 6) {
            servi = "Alimentación";
            if (entrada == 1) {
                entrada = "Nacional";
            } else if (entrada == 2) {
                entrada = "Extrangero";
            }

            if (disponi == "d") {
                disponi = "Desayuno";
            } else if (disponi == "a") {
                disponi = "Almuerzo";
            } else if (disponi == "c") {
                disponi = "Cena";
            } else if (disponi == "dya") {
                disponi = "Desayuno y Almuerzo";
            } else if (disponi == "dyc") {
                disponi = "Desayuno y Cena";
            } else if (disponi == "ayc") {
                disponi = "Almuerzo y Cena";
            } else if (disponi == "dayc") {
                disponi = "Desayuno, Almuerzo y Cena";
            }
        } else if (servicio == 7) {

        }
        
       
        
        var nuevaFila = '<tr>' +
                '<td>' + servi + '</td>' +
                '<td>' + entrada + '</td>' +
                '<td>' + disponi + '</td>' +
                '<td>' + cant + '</td>' +
                '<td>' + precio + '</td>' +
                '<td><button  id="del3" style="border-radius: 30px; width: 30px; height: 30px; padding: 0px;"><img src="img/icon/delete.png" width="100%"></button></td>' +
                '</tr>';
        $("#tabla3 tbody").append(nuevaFila);
    });

    

    $("#tabla3").on("click", "#del3", function () {
        $(this).parents("tr").remove();
    });
});