<div class="cont1">

    <div class="cont2">
        <div class="pestañasR">
            <a href="?c=reservacionUsuarioV1&aIndex">
                <button class="infoReser2">1. Información de Reserva</button>
            </a>
            <a href="?c=reservacionUsuarioV2&aIndex">
                <button class="confirReser2">2. Confirmar Reservación</button>
            </a>
        </div>        
        <div class="cont3">

            <label style="color: #68923d;"><u>Confirmar Reservación</u></label>
            <div class="divTabla1">
                <?php $reser = $this->modelReservacion->Obtener($re->numReservacion); ?>
                <table id="tabla1" class="tabla1" style="margin: auto; text-align: center;">
                    <tr>
                        <th>
                            <label style="color: #68923d; "><u>Información Personal</u></label>    
                        </th>
                        <th>

                            <label style="color: #68923d; "><u>Información de la reservación</u></label> 

                        </th>
                    </tr>
                    <tr>
                        <th>
                            <label style="">Nombre: </label>
                            <label><?php echo $reser->nombreUsuario; ?></label>



                        </th>
                        <th>

                            <label style="">Parque Nacional: </label>
                            <label><?php echo $reser->parqueNacional; ?></label>

                        </th>
                    </tr>
                    <tr>
                        <th>


                            <label style="">Residencia: </label>

                            <label></label>

                        </th>
                        <th>
                            <label style="">Sector de entrada: </label>

                            <label><?php echo $reser->sector; ?></label>
                        </th>
                    </tr>
                    <tr>
                        <th>

                            <label style="" >Correo Electronico: </label>
                            <label><?php echo $reser->emailUsuario; ?></label>


                        </th>
                        <th>

                            <label style="">Visita: </label>
                            <label><?php echo $reser->ingresoPor; ?></label>

                        </th>
                    </tr>
                    <tr>
                        <th>

                            <label style="">Telefono: </label>
                            <label></label>

                        </th>
                        <th>


                            <label style="">Tipo de visita: </label> 
                            <label><?php echo $reser->tipoVisita; ?></label>
                        </th>
                    </tr>
                    <tr>
                        <th>

                            <label style="">Fecha de entrada: </label>
                            <label><?php echo $reser->fEntrada; ?></label>

                        </th>
                        <th>



                        </th>
                    </tr>
                </table>
            </div>




            <!--                <div class="pestana2div">
                                <label style="color: #68923d; margin-left: 20px;"><u>Información Personal</u></label>
                                <label style="color: #68923d; margin-left: 170px;"><u>Información de la reservación</u></label>
                            </div>
            
                            <div class="pestana2div">
                                <label style="margin-left: 20px;">Nombre: Eddier Lopez Lopez</label>
                                <label></label>
                                <label style="margin-left: 120px;">Area Silvestre: Parque Nacional Santa Rosa</label>
                                <label></label>
                            </div>
            
                            <div class="pestana2div">
                                <label style="margin-left: 20px;">Residencia: Costa Rica</label>
                                <label style="margin-left: 160px;">Sector de entrada: Sector Santa Rosa</label>
                                <label></label>
                            </div>
                            <div class="pestana2div">
                                <label style="margin-left: 20px;" >Correo Electronico: lopez.eddier@gmail.com</label>
                                <label></label>
                                <label style="margin-left: 20px;">Visita: por un día</label>
                                <label></label>
                            </div>
                            <div class="pestana2div">
                                <label style="margin-left: 20px;">Telefono: 8499-6348</label>
                                <label style="margin-left: 180px;">Tipo de visita: turismo</label>
            
                            </div>
                            <div class="pestana2div">
                                <label style="margin-left: 335px;">Fecha de entrada: 7 nov 2018</label>
                                <label></label>
                            </div>-->


            <div class="divTabla1">


                <table id="tabla4" class="tabla1" style="margin: auto; text-align: center;">
                    <tr class="encabezadoTabla" style="text-align: center;">
                        <th>Visitante</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                    <?php foreach ($this->modelPersona->ListarPorReservacion($re->numReservacion) as $p): ?>
                        <tr>
                            <td>
                                <?php echo $p->tipo ?>
                            </td>
                            <td>
                                <?php echo $p->cantidad ?>
                            </td>
                            <td>
                                <?php
                                $moneda = $this->modelTipoV->obtenerMoneda($p->tipo);
                                if ($moneda == "C") {
                                    echo "₡" . $p->total;
                                } else if ($moneda == "D") {
                                    echo "$" . $p->total;
                                }
                                ?>
                            </td>  
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td> </td>
                        <td> </td>
                        <td>
                            Precio diario Nacionales: 
                            <?php
                            $totalColones = $this->modelPersona->CalculoPrecioVisitantesColones($re->numReservacion);
                            if ($totalColones == NULL) {
                                echo "₡0";
                            } else {
                                echo "₡" . $totalColones;
                            }
                            ?><br>

                            Precio diario Extranjeros: 
                            <?php
                            $totalDolares = $this->modelPersona->CalculoPrecioVisitantesDolares($re->numReservacion);
                            if ($totalDolares == NULL) {
                                echo "$0";
                            } else {
                                echo "$" . $totalDolares;
                            }
                            ?>
                        </td>
                    </tr>
                </table>

                <h1 style="color: red;">
                    Total a Pagar para Nacionales: <?php echo $this->modelPersona->CalculoPrecioTotalColon($re->numReservacion); ?><br>
                    Total a Pagar para Extranjeros: <?php echo $this->modelPersona->CalculoPrecioTotalDolar($re->numReservacion); ?><br>
                    
                </h1>
                <div>
                    <p style="color: red; margin-left: 400px;">*Se recuerda que el monto de la alimentacion se cancela anticipadamente.</p>
                </div>


                <div class="divTabla2cont2">

                </div>
                <!--                <div style="margin: 10px;">
                                    <label style="color: red; margin-left: 670px;"> </label>
                                    <labe><?php // echo $this->modelPersona->CalculoPrecioVisitantes($re->numReservacion)->total;    ?></labe>
                                    
                                </div>-->
                <div style="margin: 20px;">
                    <label style="color: #68923d;"><u>Información de Servicios</u></label>
                </div>
                <h1>
                    Servicios Solicitados
                </h1>
                <div class="divTabla1"> 
                    <?php
                    $servi = $this->modelReservacion->Obtener($re->numReservacion);
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
                <form action="?c=reservacionUsuarioV2" method="post">
                    <input type="text" 
                           value="<?php echo $re->numReservacion; ?>" 
                           name="numReservacion" >
                    <input type="text" 
                           value="<?php echo $this->modelPersona->CalculoPrecioTotalColon($re->numReservacion); ?>" 
                           name="totalPagarColones" >
                    <input type="text" 
                           value="<?php echo $this->modelPersona->CalculoPrecioTotalDolar($re->numReservacion); ?>" 
                           name="totalPagarDolares" >
                    <div>
                        <input class="btnR azulO botonesReser" 
                               type="submit" value="Atras" name="a" >
                        <!--                        <a href="?c=reservacionUsuarioV1&aIndex">
                                                                                <button class="btn azulO botonesReser">Atras</button>
                                                                        </a>                                     -->

                        <input class="btnR azulO" 
                               type="submit" value="Terminar" name="a" >
                        <!--                        <a href="?c=reservacionUsuarioV1&aIndex">
                                                    <button class="btn azulO" >Terminar</button>
                                                </a>-->
                    </div>
                </form>


                
            </div>

        </div>


    </div>
</div>







