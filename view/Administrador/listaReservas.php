
<div class="AdminitracionReserv">


    <label><br>Lista<br></label>
    <hr/>


    <form action="?c=listaReservas" method="post">
        <!--<input name="tipo" type="text" value="<?php echo $p->tipo; ?>">-->
        <div style="text-align: center; margin: 30px;">
            <input type="submit" value="Visitantes" name="a" class="btnAdmi"/>
            <input type="submit" value="Servicios" name="a" class="btnAdmi"/>
            <input type="submit" value="Detalles" name="a" class="btnAdmi"/>
        </div>



        <div class="divTablaAdm" style="margin: auto;">
            <table class="tablaAdmi" style="margin: auto; text-align: center; ">
                <tr class="encabezadoTabla" style="text-align: center;">
                    <th style="width:10px;"></th>
                    <th>Parque</th>
                    <th>Sector</th>
                    <th>Ingreso</th>
                    <th>Entrada</th>
                    <th>Salida</th>
                    <th>Tipo Visit</th>
                    <th>Usuario</th>
                    <th>Correo</th>
                    <th>T Nacio</th>
                    <th>T Extran</th>
    <!--                    <th>Estado</th>-->
                </tr>
                <tbody>
                    <?php foreach ($this->modelReservacion->ListarA() as $r): ?>
                        <?php $valor = $r->numReservacion; ?>
                        <tr>
                            <td><input type=radio name="id" value=<?php echo $valor; ?> ></td>

                            <td><?php echo $r->parqueNacional; ?></td>
                            <td><?php echo $r->sector; ?></td>
                            <td><?php echo $r->ingresoPor; ?></td>
                            <td><?php echo $r->fEntrada; ?></td>
                            <td><?php echo $r->fSalida; ?></td>
                            <td><?php echo $r->tipoVisita; ?></td>
                            <td><?php echo $r->nombreUsuario; ?></td>
                            <td><?php echo $r->emailUsuario; ?></td>
                            <td>
                                <?php
                                $tc = $r->totalColones;

                                if ($tc == NULL) {
                                    echo "₡0";
                                } else {
                                    echo "₡" . $tc;
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                $td = $r->totalDolares;
                                if ($td == NULL) {
                                    echo "$0";
                                } else {
                                    echo "$" . $td;
                                }
                                ?>
                            </td>
                            <th></th>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    </form>


</div>

