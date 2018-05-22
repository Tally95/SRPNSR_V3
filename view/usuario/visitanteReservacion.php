<div class="cont1">

    <form action="?c=visitanteReservacion" method="post">

        <div class="divTabla1" > 

            <input type="text" 
                   value="<?php echo $re->numReservacion; ?>" 
                   name="numReservacion" >

            <table id="tabla1" class="tabla1" style="margin: auto; text-align: center;">
                <tr class="encabezadoTabla" style="text-align: center;">

                    <th>Visitante</th>
                    <th>Cantidad</th>
                    <th></th>
                </tr>
                <tr>
                    <td>
                        <select name="visitante" id="entrada" onchange="">
                            <!--                            <option value="Mujer(es)">Mujer(es)</option>
                                                        <option value="Hombre(s)">Hombre(s)</option>
                                                        <option value="Niña(s)">Niña(s)</option>
                                                        <option value="Niño(s)">Niño(s)</option>
                                                        <option value="3">Estudiante(s)</option>
                                                        <option value="Mujer(es) Extranjera(s)">Mujer(es) Extranjera(s)</option>                                    
                                                        <option value="Hombre(s) Extranjero(s)">Hombre(s) Extranjero(s)</option>
                                                        <option value="Niña(s) Extranjera(s)">Niña(s) Extranjera(s)</option>
                                                        <option value="Niño(s) Extranjero(s)">Niño(s) Extranjero(s)</option>-->
                            <?php foreach ($this->modelTipoV->Listar() as $t): ?>
                                <option><?php echo $t->tipo ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <input style="width: 40px;" type="number" name="cantidad" value="1" min="1" max="64"/>

<!--                        <select name="cantidad" id="cant" onchange="calcSubtotal(this.value)">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
</select>-->
                    </td>

                    <td>
                        <!--<a href="?c=visitanteReservacion&a=GuardarVisitantes">-->
                        <!--<button id="add" style="border-radius: 30px; width: 30px; height: 30px; padding: 0px;" >-->
                            <!--<img src="img/icon/add.png" width="100%"></button>-->
                        <!--agregar imagen medante css-->
                        <input class="btnPeque verde" id="ad" type="submit" value="GuardarVisitantes" name="a" >
                        <!--<img style="border-radius: 30px; width: 30px; height: 30px; padding: 0px;" src="img/icon/add.png" width="100%">-->

                        <!--</a>-->                                        
                    </td>
                </tr>
            </table>



        </div>



        <div class="divTabla1" id="tablaVisi">

            <table id="tabla4" class="tabla1" style="margin: auto; text-align: center;">
                <tr class="encabezadoTabla" style="text-align: center;">

                    <th>Visitante</th>
                    <th>Cantidad</th>
                    <th>Total</th>       
                    <th style="width: 100px;"><input class="btnPeque rojo" id="ad" type="submit" value="BorrarVisitantes" name="a" ></th>
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
                        <td>
                            <input type="radio" name="idPersona" value="<?php echo $p->idPersona ?>"/>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td> </td>
                    <td style="color: blue;">
                        <strong>
                            Cantidad de Vistantes: 
                            <?php
                            $cantidaPesonas = $this->cant;
                            if ($cantidaPesonas == NULL) {
                                echo "0";
                            } else {
                                echo $cantidaPesonas;
                            }
                            ?>
                        </strong> 
                    </td>
                    <td style="color: red;">
                        <strong>
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
                        </strong>
                    </td>
                    <td> </td>
                </tr>
            </table>




        </div>
        <div class="parrafo3" style="color: red; font-size: 9px; margin-left: 100px;">
            <p>
                *La siguiente tabla hace referencia a precios de hospedaje por noche. 
            </p>
        </div>


        <table id="tabla1" class="tabla1" style="margin: auto; text-align: center;">
            <tr class="encabezadoTabla" style="text-align: center;">
                <th>Visitante</th>
                <th>Precio</th>
            </tr>
            <?php foreach ($this->modelTipoV->Listar() as $t): ?>
                <tr>
                    <td>
                        <?php echo $t->tipo; ?>
                    </td>
                    <td>
                        <?php
                        $monedaTabla = $this->modelTipoV->obtenerMoneda($t->tipo);
                        if ($monedaTabla == "C") {
                            echo "₡" . $t->precio;
                        } else if ($monedaTabla == "D") {
                            echo "$" . $t->precio;
                        }
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <!--        onunload="<?php
        // $this->modelPersona->EliminarPorNumReser($_REQUEST['numReservacion']);
//                $this->modelReservacion->Eliminar($_REQUEST['numReservacion']);
        ?>"-->

        <div style="text-align: center; padding: 10px;">
            <input type="submit" value="Atras" name="a" class="btnR azulO botonesReser" />
            <input type="submit" value="Cancelar" name="a" class="btnR azulO botonesReser" />

            <!--            <a href="index.php">
                            <button class="btn azulO botonesReser">Cancelar</button>
                        </a>                                     -->
            <!--<a href="?c=visitanteReservacion&a=Confirmar">-->
            <input type="submit" value="Confirmar" name="a" class="btnR azulO botonesReser" />
            <!--<button class="btn azulO" >Confirmar</button>-->
            <!--</a>-->

        </div>

    </form>
</div>