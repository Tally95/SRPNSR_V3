
<div class="cuerpoReservaciones-editar">
    <h1 class="page-header">
        <h2>Editar Reservacion</h2>
</h1>

<ol class="breadcrumb">
    <h3><a href="?c=administracionDeReservaciones">Administracion de Reservaciones</a></h3>
  
</ol>
<!--Puesto-Total-Estado-->
<form id="frm-administracionDeReserv" action="?c=administracionDeReservaciones&a=Guardar" method="post" enctype="multipart/form-data">
    <div class="form-group">
           <label>Numero de Reservacion</label>
           
        <input name="numReservacion" readonly="readonly"  value="<?php echo $alm->numReservacion; ?>" class="form-control" placeholder="" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>Parque Nacional</label>
        <input type="text" name="parqueNacional" value="<?php echo $alm->parqueNacional; ?>" class="form-control"  data-validacion-tipo="requerido|min:3" />
    </div>

    <div class="form-group">
        <label>Sector</label>
        <input type="text" name="sector" value="<?php echo $alm->sector; ?>" class="form-control"  data-validacion-tipo="requerido|min:3" />
    </div>
    <div class="form-group">
        <label>Tipo Ingreso</label>
        <input type="text" name="tipoIngreso" value="<?php echo $alm->ingresoPor; ?>" class="form-control"  data-validacion-tipo="requerido|min:3" />

    </div>
    <!--        <select name="Sector" class="form-control">
        <option <?php //  echo $alm->Sector == 1 ? 'selected' : '';   ?> value="Santa Rosa">Santa Rosa</option>
        <option <?php // echo $alm->Sector == 2 ? 'selected' : '';   ?> value="Murcielago">Murcielago</option>
    </select>-->

    <div class="form-group">
        <label>Entrada</label>
        <input type="text" name="fEntrada" value="<?php echo $alm->fEntrada; ?>" class="form-control" placeholder="Ingrese el nombre" data-validacion-tipo="requerido|min:10" />
    </div>
    
    <div class="form-group">
        <label>Días</label>
        <input type="date" name="dias" value="<?php echo $alm->dias; ?>" class="form-control"  />
    </div>
    
    <div class="form-group">
        <label>Tipo Visi</label>
        <input type="text" name="tipoVisita" value="<?php echo $alm->tipoVisita; ?>" class="form-control datepicker" data-validacion-tipo="requerido" />
    </div>
    
    <div class="form-group">
        <label>Usuario</label>
        <input  type="text" name="usuario" value="<?php echo $alm->usuario; ?>" class="form-control datepicker" placeholder="Ingrese el puesto" data-validacion-tipo="requerido" />
    </div>
    <div class="form-group">
        <label>Total</label>
        <input type="text" name=total" value="<?php echo $alm->total; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>
<!--    <div class="form-group">
        <label>Estado</label>
        <input type="text" name="Estado" value="<?php// echo $alm->Estado; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>-->
   
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>
</div>


<script>
    $(document).ready(function(){
        $("#frm-administracionDeReserv").submit(function(){
            return $(this).validate();
        });
    })
</script>
