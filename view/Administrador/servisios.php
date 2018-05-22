
<div class="AdminitracionReserv">
    <a href='?c=administracionDeReservaciones'>
        <li style="margin-right: 20px; color: black;">Administrar Reservación</li> 
    </a>




    <div>
        <?php
        $servi = $this->model->Obtener($re);
        if ($servi->alimentacion == "SI") {
            echo 'Alimentacion <br>';
        }
        if ($servi->laboratorio == "SI") {
            echo 'Labarotarios <br>';
        }
        if ($servi->lavanderia == "SI") {
            echo 'Servicio de Lavanderia <br>';
        }
        if ($servi->senderos == "SI") {
            echo 'Senderos <br>';
        }
        if ($servi->charla == "SI") {
            echo 'Charlas <br>';
        }
        if ($servi->aulaConferencia == "SI") {
            echo 'Aula de Conferencias <br>';
        }
        ?>
    </div>



</div>

