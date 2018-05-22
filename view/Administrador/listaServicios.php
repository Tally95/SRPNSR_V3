
<div class="AdminitracionReserv">
    <h1>
        Lista de Servicios
    </h1>
    <div class="divServicios">
        <?php
        $servi = $this->modelReservacion->Obtener($re);
        if ($servi->alimentacion == "SI") {
            echo '<h3>Alimentacion</h3>';
        }
        if ($servi->laboratorio == "SI") {
            echo '<h3>Labarotarios</h3>';
        }
        if ($servi->lavanderia == "SI") {
            echo '<h3>Servicio de Lavanderia</h3>';
        }
        if ($servi->senderos == "SI") {
            echo '<h3>Senderos</h3>';
        }
        if ($servi->charla == "SI") {
            echo '<h3>Charlas</h3>';
        }
        if ($servi->aulaConferencia == "SI") {
            echo '<h3>Aula de Conferencias</h3>';
        }
        ?>
    </div>
</div>

