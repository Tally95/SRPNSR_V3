
<div class="AdminitracionReserv">


    <label><br>DETALLES DE RESERVACION<br></label>


    <div class="divDetalles">
        <label>Numero de Reservacion:</label>           
        <input class="detallesInput" value="<?php echo $alm->numReservacion; ?>"/>
    </div>

    <div class="divDetalles">
        <label>Parque Nacional:</label>
        <input class="detallesInput" value="<?php echo $alm->parqueNacional; ?>"/>
    </div>

    <div class="divDetalles">
        <label>Sector:</label>           
        <input class="detallesInput" value="<?php echo $alm->sector; ?>"/>
    </div>

    <div class="divDetalles">
        <label>El tipo de Ingreso:</label>
        <input class="detallesInput" value="<?php echo $alm->ingresoPor; ?>"/>
    </div>

    <div class="divDetalles">
        <label>Fecha de Entrada:</label>           
        <input class="detallesInput" value="<?php echo $alm->fEntrada; ?>"/>
    </div>

    <div class="divDetalles">
        <label>Fecha de Salida:</label>
        <input class="detallesInput" value="<?php echo $alm->fSalida; ?>"/>
    </div>

    <div class="divDetalles">
        <label>Dias Reservados:</label>           
        <input class="detallesInput" value="<?php echo $alm->dias; ?>"/>
    </div>

    <div class="divDetalles">
        <label>El motivo de ingreso:</label>
        <input class="detallesInput" value="<?php echo $alm->tipoVisita; ?>"/>
    </div>

    <div class="divDetalles">
        <label>Nombre del representante de la reserva:</label>           
        <input class="detallesInput" value="<?php echo $alm->nombreUsuario; ?>"/>
    </div>

    <div class="divDetalles">
        <label>Correo representante:</label>
        <input class="detallesInput" value="<?php echo $alm->emailUsuario; ?>"/>
    </div>

    <div class="divDetalles">
        <label>El total de Nacionales:</label>           
        <input class="detallesInput" value="<?php
        $tc = $alm->totalColones;

        if ($tc == NULL) {
            echo "₡0";
        } else {
            echo "₡" . $tc;
        }
        ?>"/>
    </div>

    <div class="divDetalles">
        <label>El total de Extranjeros:</label>           
        <input class="detallesInput" value="<?php
               $td = $alm->totalDolares;
               if ($td == NULL) {
                   echo "$0";
               } else {
                   echo "$" . $td;
               }
               ?>"/>
    </div>

</div>

