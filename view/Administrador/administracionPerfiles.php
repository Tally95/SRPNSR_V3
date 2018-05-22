
<div class="admiPerfiles">
   
    

    <label>ADMINISTRACION PERFILES<br></label>
    <hr/>

<!--    <div class="cuerpo1Perfiles" style="text-align: center;">
        <a href='?c=administracionPerfiles&a=IndexAgregar'><button class="botonesPerfiles">AGREGAR</button></a>
        <a href='?c=administracionPerfiles&a=IndexEditar'><button class="botonesPerfiles">EDITAR</button></a>
        <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href='?c=administracionPerfiles&a=EliminarP'><button class="botonesPerfiles">ELIMINAR</button></a>
    </div>
    <br><br>-->
    <form action="?c=administracionPerfiles" method="post">
        <div style="text-align: center;">
            <input type="submit" value="Agregar" name="a" class="botonesPerfiles"/> 
            <input type="submit" value="Eliminar" name="a" class="botonesPerfiles"
                   onclick="javascript:return confirm('¿Seguro de eliminar esta Reservación?');"/>
            <input type="submit" value="Editar" name="a" class="botonesPerfiles"/>
        <div  class="contTablaPerfiles">
            <table class="tablaPerfiles" >
                <thead>
                    <tr>
                        <th style="width:70px;"></th>
                        <!--<th>ID</th>-->
                        <th>NOMBRE</th>
                        <th>CORREO</th>
                        <th>CLAVE</th>
                        <th>TIPO</th>
                        <th>TELEFONO</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($this->modelP->Listar() as $r): ?>
                        <?php $valor = $r->idPatrocinador; ?>
                        <tr>
                            <td>
                                <input type="radio" name="idPatrocinador" value="<?php echo $valor; ?>">

                            </td>
                            <td>
                                <?php echo $r->nombre; ?>
                            </td>
                            <td>
                                <?php echo $r->correo; ?>
                            </td>
                            <td>
                                <?php echo $r->clave; ?>
                            </td>
                            <td>
                                <?php echo $r->tipo; ?>
                            </td>
                            <td>
                                <?php echo $r->telefono; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </form>
</div> 

