
<?php 
     require_once 'Model/BD.php';
?>

<!doctype html>
<html lang="en">
    <head>
        
       
        <!--bootstrap.main.css-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        
        <meta charset="UTF-8">
        <title>Calendario</title>
        <link rel='stylesheet' type='text/css' href='assets/css/fullcalendar.css' />
        <!--<link rel='stylesheet' type='text/css' href='assets/css/estiloCalendario.css' />-->
        <link href="assets/css/fullcalendar.print.min.css" rel="stylesheet" media="print"/>
        <script src="assets/js/moment.min.js"></script>
        <script type='text/javascript' src='assets/js/jquery.min.js'></script>
        <script type='text/javascript' src='assets/js/fullcalendar.js'></script> 
        
        <script src='assets/js/locale/es.js'></script>
        
        <style>
            
            .Turismo{
                background: #999;
                color: #ffffff;
               
            }
            
            .Gira{
                background: #81994d;
                color: white;
            }
            
            .Investigacion{
                background: seagreen;
                color: white;
            }
            .letrasGrandes{
                 font-size: 15px;
            }
            
        </style>
       
        <script language="JavaScript">
      $(document).ready(function() {
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listWeek'
            },
            navLinks: true,
            eventLimit: true,
            eventClick: function(event) {
                
            $('#vizualizar #title').text(event.title);
            $('#vizualizar #start').text(event.start.format('DD/MM/YYYY'));
            $('#vizualizar #end').text(event.end.format('DD/MM/YYYY'));
            $('#vizualizar').modal('show');
            return false;

    // change the border color just for fun
    $(this).css('border-color', 'red');

  },
            events:[
                <?php
                    foreach ($sth as $fila){
                ?>
                {
                   id:"<?php echo $fila["numReservacion"];?>",
                   title:"<?php echo $fila["nombreUsuario"]; ?> - <?php echo $fila["parqueNacional"];?> - <?php echo $fila["sector"];?> - <?php echo $fila["ingresoPor"];?> - <?php echo $fila["tipoVisita"];?>",
                   start:"<?php echo $fila["fEntrada"];?>",
                   end:"<?php echo $fila["fSalida"];?> 11:59:00",
                   className:"<?php echo $fila["tipoVisita"];?> letrasGrandes"
                },
                <?php
                }
                ?>  
            ]
        });

      });
    </script>
    <style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
  }

  #calendar {
      width: auto;
      max-width: 2000px;
      margin: 0 auto;
      margin-left: 60px;
  }

</style>
    </head>
    
    <body style="background: coral;">
        
        
     
    
        <div class="row">
            
            <div class="col-md-1"></div>
            <div class="col-md-10">
            <div id="calendar"></div>
            </div>
            <div id='calendar'></div>
            <div class="col-md-1"></div>
            
        
        </div>
      
    <div class="modal fade" id="vizualizar" tabindex="-1" role="dialog" 
         aria-labelledby="exampleModalLabel" data-backdrop="static">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
              
           <!--Boton de cerrar con la X-->   
           <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
              <span aria-hidden="true">&times;</span>
            </button>-->
           <h5 class="modal-title">Datos de la Reservaci&oacute;n</h5>
          </div>
        <div class="modal-body">
            <dl class="dl-horizontal">
                <dt>Title:</dt>
                <dd id="title"></dd>
                 <dt>Inicio:</dt>
                <dd id="start"></dd>
                 <dt>Fin:</dt>
                <dd id="end"></dd>
            </dl>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success " data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div> 

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    </body>

</html>















<!--<div class="vistazoCalen">
     <div class="nav_wrapper">
    <nav class="nav-menu">
        <ul class="clearfix"> 
            <a href='?c=administracionDeReservaciones'>
               <li style="margin-right: 20px; color: black;">Administrar Reservación</li> 
            </a>
            <a href='?c=vistazoCalendario'>
                <li style="margin-right: 20px; color: black;">Calendario</li>
            </a>   
            <a href='?c=reportes'>
                <li style="margin-right: 20px; color: black;">Reportes</li>
            </a>
            <a href='?c=administracionPerfiles'>
                <li style="margin-right: 20px; color: black;">Administración de Perfiles</li>
            </a> 
        </ul>  
    </nav>
    
     </div><br>

     <label>VISTAZO CALENDARIO<br></label>
     
     <hr/>
     <div class="cuerpoVistazo" style="padding: 8px; ">
         <label style="margin-left: 40px;">SECTOR</label>
         <select style="margin-left: 15px;">
             <option>Santa Rosa</option>
             <option>2</option>
             <option>3</option>
             <option>4</option>
         </select>
         <form style="float:right; margin-right: 40px;">
             <input type="search" id="miBusqueda" name="q"
                    placeholder="Buscar ...">
             <button>Buscar</button>
         </form>
     </div>
     sdefwregtrhytjuykiulihkjhggfdfghj,kk.jhthjuklkjyhtrhyjukjtregthyjhtrtytjutretds
     
<br/><br/>
<div id="calendario" style="margin: auto;">
  <div id="anterior" onclick="mesantes()"></div>
  <div id="posterior" onclick="mesdespues()"></div>
  <h2 id="titulos"></h2>
  <table id="diasc" style="text-align: center;">
    <tr id="fila0"><th>Lunes</th><th>Martes</th><th>Miercoles</th><th>Jueves</th><th>Viernes</th><th>Sabado</th><th>Domingo</th></tr>
    <tr id="fila1"><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
    <tr id="fila2"><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
    <tr id="fila3"><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
    <tr id="fila4"><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
    <tr id="fila5"><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
    <tr id="fila6"><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
  </table>
  <div id="fechaactual"><i onclick="actualizar()">HOY: </i></div>
  
</div>
<br>
<div>
         <button class="botonesCal">Anterior</button>
         <button class="botonesCal">Siguiente</button>
     </div>
</div>

















-->


