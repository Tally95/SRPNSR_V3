
<div class="AdminitracionReserv">
<!--    <a href='?c=administracionDeReservaciones'>
        <li style="margin-right: 20px; color: black;">Administrar Reservación</li> 
    </a>
    
    <form action="?c=administracionDeReservaciones" method="post"><div style="text-align: center;">
            <input type="submit" value="Asignar" name="a" class="btnAdmi"/> 
            <input type="submit" value="Eliminar" name="a" class="btnAdmi"
                   onclick="javascript:return confirm('¿Seguro de eliminar esta Reservación?');"/>
            <input type="submit" value="Editar" name="a" class="btnAdmi"/>
        </div>
    </form>-->


    <div class="divTablaAdm" style="margin: auto;">
        <table class="tablaAdmi" style="margin: auto; text-align: center; ">
            <tr class="encabezadoTabla" style="text-align: center;">
                <th style="width:10px;"></th>
                <th>idPersona</th>
                <th>tipo</th>
                <th>precio</th>
                <th>cantidad</th>
                <th>total</th>
            </tr>
            <tbody>
                <?php foreach ($this->modelPersona->ListarPorReservacion($re) as $r): ?>
                    <?php $valor = $r->idPersona; ?>
                    <tr>
                        <td><input type=radio name="id" value=<?php echo $valor; ?> ></td>

                        <td><?php echo $r->idPersona; ?></td>
                        <td><?php echo $r->tipo; ?></td>
                        <td><?php echo $r->precio; ?></td>
                        <td><?php echo $r->cantidad; ?></td>
                        <td><?php echo $r->total; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
      
        
        
    </div>



</div>

