
<div class="editaPerfiles">
    
     <form action="?c=administracionPerfiles&a=Actualizar" method="post">
        <div class="editarPerfcuerpo" style="border: solid 2px; width: 300px; margin: auto; padding: 10px;" >
            <label>EDITAR PERFIL</label>
            <hr/>
           <label style="margin-left: 20px;">ID</label>
           <input name="idPatrocinador"type="text" value="<?php echo $alm->idPatrocinador; ?>"style="margin-left: 55px;">
            <br><br>
            <label style="margin-left: 5px;">NOMBRE</label>
            <input name="nombre" value="<?php echo $alm->nombre; ?>"type="text" style="margin-left: 15px;">
            <br><br>
            <label>CORREO</label>
            <input name="correo"value="<?php echo $alm->correo; ?>"type="text" style="margin-left: 25px;">
            <br><br>
            <label>CLAVE</label>
            <input name="clave" value="<?php echo $alm->clave; ?>"type="text" style="margin-left: 30px;">
            <br><br>
            <label style="margin-left: 1px;">TELEFONO</label>
            <input name="tel"type="tel"value="<?php echo $alm->telefono; ?>" style="margin-left: 10px;">
            <br><br>
            <label style="margin-left: 30px;">TIPO</label>
            <select name="tipo"style="margin-left: 20px;">
                <option value="0">Seleccione</option>
                <option <?php echo $alm->tipo == 1 ? 'selected' : ''; ?> value="tipo1">sdd</option>
                <option <?php echo $alm->tipo == 2 ? 'selected' : ''; ?> value="tipo2">sedfer</option>
            </select>
            <br><br>
            <button class="botonesEditarPerfil">EDITAR</button>
        </div>
    </form>


    <button class="botonesEditarPerfil">CANCELAR</button>
</div>
