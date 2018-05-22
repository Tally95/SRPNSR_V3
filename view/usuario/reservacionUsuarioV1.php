<div class="cont1"> 

    <a href="?c=login" style="padding-top: 3px; padding-right: 3px; float: right;">
        Administarción De Reservaciones</a>

    <div class="cont2"> 

        <div class="pestañasR">


            <button class="infoReser">1. Información de Reserva</button>            
            <!--            <button class="confirReser">2. Confirmar Reservación</button> -->

        </div>        

        <div class="cont3">

            <label class="label1">Datos de Reservación</label> 

            <div class="cont4">               

                <div class="reservDiv1">

                    <form action="?c=reservacionUsuarioV1" method="post">  
                        <input class="" type="text" value="<?php echo $reservacion->numReservacion; ?>"/>

                        <div class="divTabla1">

                            <div class="divTabla1" style="width: auto;">

                                <table>
                                    <tr>
                                        <th  style="width: 400px;" class="th2">

                                            <label>Parque Nacional: </label>
                                            <select required 
                                                    name="cboParque" id="cboParque" 
                                                    class="cboParque "style="width: 243px;">
                                                <!--<option value="">Seleccione...</option>-->
                                                <?php // foreach ($this->modelReservacion->ListarParque() as $Par): ?>
                                                <!--<option value="<?php // echo $Par->nomParque ?>">-->
                                                    <?php // echo $Par->nomParque ?>
<!--                                                </option>-->
                                                <?php // endforeach; ?>
                                            </select>
                                        </th>
                                        <th style="width: 300px;" class="th2">

                                            <label>Sector: </label>
                                            <select style="width: 243px;" required id="cboSector" 
                                                    name="cboSector" >
                                                <option value="0">Seleccione...</option>
                                                <?php // foreach ($this->modelReservacion->ListarSector() as $sec): ?>
                                                    <!--<option><?php // echo $sec->nombre  ?></option>-->
                                                <?php // endforeach; ?>
                                            </select>

                                        </th>
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
                                    </script>
                                    <script type="text/javascript" src="Assets/selects/js/selects.js"></script>
                                </tr>
                                <tr>
                                    <th class="th2">

                                            <input  checked="checked" type="radio"
                                                   name="ingreso" value="Hospedaje" required
                                                   onclick="document.getElementById('fEntrada').disabled = false;
                           document.getElementById('fSalida').disabled = true;
                           fEntrada.disabled = !this.checked;
                           fSalida.disabled = !this.checked;">Ingreso por Hospedaje

                                        </th>
                                        <th class="th2">

                                            <label>Fecha de Entrada</label>
                                            <input class="" id="fEntrada" style="width: 165px;"
                                                   name="fEntrada"onchange="updateFSalida(this.value);"
                                                   type="date"  required>

                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="th2">

                                            <input type="radio" 
                                                  name="ingreso" value="Acampar" required
                                                  onclick="document.getElementById('fEntrada').disabled = false;
                           document.getElementById('fSalida').disabled = true;
                           fEntrada.disabled = !this.checked;
                           fSalida.disabled = !this.checked;">Ingreso para acampar
                                        </th>
                                        <th class="th2">

                                            <label>Fecha de Salida</label>
                                            <input class="" id="fSalida" style="width: 180px;"
                                                   name="fSalida"onchange=""type="date" required>
                                            <script src="Assets/js/controlFecha.js"></script>

                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="th2">

                                            <input type="radio" name="ingreso" 
                                                   value="IngresoDia" required
                                                   onclick="document.getElementById('fEntrada').disabled = false;
                           document.getElementById('fSalida').disabled = true;
                           fEntrada.disabled = !this.checked;
                           fSalida.disabled = this.checked;">Ingreso por día

                                        </th>
                                        <th class="th2">

                                            <label>Tipo de Visita</label>
                                            <select class="" required name="tipoVisita">
                                                <option value="">Seleccione el Tipo de Visita...</option>
                                                <?php foreach ($this->modelReservacion->ListarTipoVisita() as $v): ?>
                                                    <option><?php echo $v->nomTipoVisita ?></option>
                                                <?php endforeach; ?>
                                            </select>

                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="th2">
                                            <label>Detalles: </label><br>
                                            <textarea name="Detalles" class="Detalles " ></textarea></th>
                                        <th class="th2">                                            

                                        </th>
                                    </tr>
                                </table>


                                <div class="divTabla1">

                                    <div class="parrafo1" style="color: red; font-size: 9px">
                                        <p>*Varia de acuerdo al tipo de cambio del dolar estadounidense
                                            **Primaria y secundaria en grupos organizados y cooordinados
                                            con el programa de ecoturismo ecoturismo@acguanacaste.ac.cr o por fax al 2666-5020</p>
                                    </div>
                                    <h4 style="color: #68923d;"><u>Tabla de servicios con precios para nacionales y extranjeros</u></h4>


                                    <table class="tabla1">
                                        <tr class="encabezadoTabla" style="text-align: center;">
                                            <th style="height:40px;">Servicios</th>
                                            <th>Disponibilidad</th>
                                            <th>Nacionales Adulto/Niño</th>
                                            <th>Extranjero Adulto/Niño</th>

                                        </tr>
                                        <tr>
                                            <td>Cuartos (por día)</td>
                                            <td>74 camas</td>
                                            <td>₡12.000 / ₡10.000</td>
                                            <td>$50 / $20</td>
                                        </tr>
                                        <tr>
                                            <td>Laboratorio (por día)</td>
                                            <td>1 </td>
                                            <td>₡20.000 </td>
                                            <td>$70</td>
                                        </tr>
                                        <tr>
                                            <td>Lavanderia (por persona)</td>
                                            <td>1 </td>
                                            <td>₡2.000 / ₡1.000</td>
                                            <td>$10 / $5</td>
                                        </tr>
                                        <tr>
                                            <td>Senderos</td>
                                            <td>2</td>
                                            <td>₡1.500 / ₡1.000</td>
                                            <td>$10 / $5</td>
                                        </tr>
                                        <tr>
                                            <td>Charlas (por persona)</td>
                                            <td>Si</td>
                                            <td>₡1.500 / ₡1.000</td>
                                            <td>$10 / $5</td>
                                        </tr>
                                        <tr>
                                            <td>Alimentación (por persona)</td>
                                            <td>
                                                1.Desayuno<br>
                                                2.Almuerzo<br>
                                                3.Cena
                                            </td>
                                            <td>₡1.200 </td>
                                            <td>$8</td>
                                        </tr>
                                        <tr>
                                            <td>Aula Conferencia</td>
                                            <td>1</td>
                                            <td>₡20.000 </td>
                                            <td>$70</td>
                                        </tr>
                                    </table>
                                </div>



                                <div class="divCont">

                                    <div class="divCol">
                                        
                                        <div class="parrafo3" style="color: red; font-size: 9px">
                                            <p>* Los servicios son son cordinidos y pagados en el Area de Conservacion</p>
                                            <p>  Exepto la Alimetacion, la cual se paga por adelantado</p>
                                        </div>
                                        
                                        <table class="tabla2">
                                            <tr>
                                                <th>
                                                    <h2>Servicios</h2>
                                                </th> 
                                            </tr>
                                            
                                            <tr>
                                                <th class="th2">
                                                    <input  name="alimen" type="checkbox" value="alimen"/> Alimentación <br>
                                                </th>
                                                <th class="th2">
                                                    <input  name="lab" type="checkbox" value="lab"/> Laboratorio <br>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th class="th2">
                                                    <input  name="lava" type="checkbox" value="lava"/> Lavanderia <br>
                                                </th>
                                                <th class="th2">
                                                    <input  name="sende" type="checkbox" value="sende"/> Senderos <br>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th class="th2">
                                                    <input  name="char" type="checkbox" value="char"/> Charlas <br>
                                                </th>
                                                <th class="th2">
                                                    <input  name="aulaC" type="checkbox" value="aulaC"/> Aula Conferencias <br>
                                                </th>
                                            </tr>


                                        </table>








                                    </div>

                                    <div class="divCol">
                                        <table class="tabla2">
                                            <tr>
                                                <th>
                                                    <h2>Informacion del Usuario</h2>
                                                </th> 
                                            </tr>
                                            <tr>
                                                <th class="th2">
                                                    <label>Nombre Completo: </label><br>
                                                    <input class="anchoInputUsuario" required name="nombreUsu" type="text"> 
                                                </th>
                                                <th class="th2">
                                                    <label>Email: </label><br>
                                                    <input class="anchoInputUsuario" required name="emailUsu" type="email">
                                                </th>
                                            </tr>
                                            <tr>
                                                <th class="th2">
                                                    <label>Institucion: </label><br>
                                                    <input class="anchoInputUsuario" required name="insUsu" type="text">
                                                </th>
                                                <th class="th2">
                                                    <label>Telefono: </label><br>
                                                    <input class="anchoInputUsuario" required name="telUsu" type="number">
                                                </th>
                                            </tr>
                                            <tr>
                                                <th class="th2">
                                                   <label>Residencia: </label><br>
                                                    <input class="anchoInputUsuario" required name="resiUsu" type="text">
                                                </th>
                                                <th class="th2">
                                                    <label>Nacionalidad: </label><br>
                                                    <input class="anchoInputUsuario" requiredname="nacioUsu" type="text">
                                                </th>
                                            </tr>
                                            
                                        </table>

                                    </div>

                                    <div class="divCol">



                                    </div>

                                </div>

                                <div class="divTabla1">

                                    <div class="parrafo3" style="color: red; font-size: 9px">

                                        <p>*Se alquila de manera completa y únicamente para investigadores</p>
                                        <p> **Se imparten diferentes charlas, que son escogidas acorde al tema que se solicite</p>
                                        <p> ***La alientación se paga por adelantado por medio de transferencia bancaria,
                                            anteriormente se enumera el tiempo de comida el cual debe indicar posteriormente
                                            si asi lo solicita
                                        </p><br>
                                        <p>*Todos los campos con (*) son de caracter obligatorios.</p>

                                    </div>

                                </div>

                                <div style="padding: 10px; text-align: center; border: solid 1px;">
                                   
                                        <input type="reset" value="Cancelar" name="a" class="btnR azulO botonesReser"/>
                                   
                                    <!--                                    <a href="index.php">
                                                                            <button class="btn azulO botonesReser">Cancelar</button>
                                                                        </a>                                     -->
                                    <!--<a href="?c=reservacionUsuarioV2&aIndex">-->
                                    <input type="submit" value="Continuar" name="a" class="btnR azulO botonesReser"/>
                                    <!--<button class="btn azulO" >Siguiente</button>-->
                                    <!--</a>-->

                                </div>





                            </div> <!--Cierre de reservacion-->

                            <!---->


                            <!--------------------------------------------------tabla 3------------------------------------------------>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>








<!--                    <table class="tabla3" id="tabla3" style="margin: auto; width: 100%; text-align: center;">
                                    <tr class="encabezadoTabla" style="text-align: center;">
                                        <th>Cant Mujeres Adultas</th>
                                        <th>Cant Hombres Adultos</th>
                                        <th>Cant Niñas</th>
                                        <th>Cant Niños</th>
                                        <th></th>
                                        <th></th>
                                        <th>Total</th>
                                        <th>Mas</th>
                                    </tr>
                                    <tr id="id-tr">
                                        <td>
                                            <input type="number" style="width: 40px" >
                                            
                                            <select id="Servi" onchange="cualSelectServi(this.value)">
                                                <option value="0">Seleccione...</option>
                                                <option value="1">Hospedaje</option>
                                                <option value="2">Laboratorio</option>
                                                <option value="3">Lavanderia</option>
                                                <option value="4">Senderos</option>
                                                <option value="5">Charlas</option>
                                                <option value="6">Alimentación</option>
                                                <option value="7">Aula Conferencia</option>
                                            </select>                                
                                        </td>
                                        <td>
                                            <select id="entradaServi" onchange="cualSelectAdmisi(this.value)">
                                                <option>Selecione un Servicio...</option>
                                            </select>
                                        </td>
            
                                        <td> 
                                            <select id="disponi" onchange="calcuDisponi(this.value)">
                                                <option>Selecione el Tipo de Admision...</option>
                                            </select>
                                        </td>
            
                                        <td>
                                            <select id="cantServi"  onchange="calcSubtotalServi(this.value)">
                                                <option>Selecione...</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </td>                            
                                        <td id="totalParci">
                                            0
                                        </td>
                                        <td></td>
                                        <td>
                                            <button id="add3" 
                                                    style="border-radius: 30px; width: 30px; height: 30px; padding: 0px;" >
                                                <img src="img/icon/add.png" width="100%"></button>
                                        </td>
            
                                    </tr>
                                </table>-->