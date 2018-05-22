<?php

require_once 'model/reservacionModel.php';
require_once 'model/personaModel.php';
require_once 'model/database.php';
require_once 'model/tipoVisitanteModel.php';

class ReservacionUsuarioV1Controller{
    
    private $modelReservacion;
    private $modelPersona;
    private $modelTipoV;
    private $cant = 0;

    public function __CONSTRUCT() {
        $this->modelReservacion = new Reservacion();
        $this->modelPersona = new Visitante();
        $this->modelTipoV = new TipoVisitante();
    }
    
    public function Index() {

        require_once 'view/header.php';
        require_once 'view/usuario/reservacionUsuarioV1.php';
        require_once 'view/footer.php';
    }

    public function Continuar() {

        $re = new Reservacion();

        $re->parqueNacional = $_REQUEST['cboParque'];
        $re->sector = $_REQUEST['cboSector'];
        $re->ingresoPor = $_REQUEST['ingreso'];
        $fechaE = strtotime($_REQUEST['fEntrada']);
        $re->annoE = date("y", $fechaE);
        $re->mesE = date("m", $fechaE);
        $re->diaE = date("d", $fechaE);
        $re->fEntrada = $_REQUEST['fEntrada'];
        if (true) {
            
        }
        $re->fSalida = $_REQUEST['fSalida'];
        $re->dias = $this->calculoDias($_REQUEST['fEntrada'], $_REQUEST['fSalida']);
        
        $re->tipoVisita = $_REQUEST['tipoVisita'];
        $re->nombreUsuario = $_REQUEST['nombreUsu'];
        $re->emailUsuario = $_REQUEST['emailUsu'];
//        $re->total = 0;
        $re->estado = "Incompleta";

        if (isset($_REQUEST['alimen'])) {
            $re->alimentacion = "SI";
        }
        if (isset($_REQUEST['lab'])) {
            $re->laboratorio = "SI";
        }
        if (isset($_REQUEST['lava'])) {
            $re->lavanderia = "SI";
        }
        if (isset($_REQUEST['sende'])) {
            $re->sendero = "SI";
        }
        if (isset($_REQUEST['char'])) {
            $re->charla = "SI";
        }
        if (isset($_REQUEST['aulaC'])) {
            $re->aulaConferencia = "SI";
        }

//        echo '<script>alert("Antes de guardar ' . $re->numReservacion . '")</script> ';
        $re->numReservacion = $this->modelReservacion->Registrar($re);
//        echo '<script>alert("Despues de guardar ' . $re->numReservacion . '")</script> ';       
//                $this->cant = $this->modelPersona->CalCantVisiPorReser($re->numReservacion);
        $this->cant = 0;
        require_once 'view/header.php';
        require_once 'view/usuario/visitanteReservacion.php';
        require_once 'view/footer.php';
    }

    public function calculoDias($entrada, $salida) {

        $fechaE = strtotime($entrada);
        $fechaS = strtotime($salida);

        //defino fecha 1
        $ano1 = date("y", $fechaE);
        $mes1 = date("m", $fechaE);
        $dia1 = date("d", $fechaE);

//defino fecha 2
        $ano2 = date("y", $fechaS);
        $mes2 = date("m", $fechaS);
        $dia2 = date("d", $fechaS);

//calculo timestam de las dos fechas
        $timestamp1 = mktime(0, 0, 0, $mes1, $dia1, $ano1);
        $timestamp2 = mktime(4, 12, 0, $mes2, $dia2, $ano2);

//resto a una fecha la otra
        $segundos_diferencia = $timestamp1 - $timestamp2;
//echo $segundos_diferencia;
//convierto segundos en días
        $dias_diferencia = $segundos_diferencia / (60 * 60 * 24);

//obtengo el valor absoulto de los días (quito el posible signo negativo)
        $dias_diferencia = abs($dias_diferencia);

//quito los decimales a los días de diferencia
        $dias_diferencia = floor($dias_diferencia);

        return $dias_diferencia + 1;
    }

//    function GuardarVisitantes(){
//        $visi = new Visitante();
//
////        $visi->cantidad = $_REQUEST['cantidad11'];
//////        $visi->idPersona = $_REQUEST[''];
////        $visi->tipo = $_REQUEST['visitante'];
////        $visi->total = $_REQUEST['total'];
//        $visi->numReservacion = $_REQUEST['numReservacion'];
//        
//        
//        
//        $this->modelPersona->Registrar($visi);
//        
//    }


    
    public function Confirmar() {
        
        
         
//        echo '<script>alert("Listo Para Guardar ")</script> ';
        
//
//
//
////        $re->total = $_REQUEST['totalParci'];
////        $this->model->Obtener($_REQUEST['numReservacion']) ?
////                        $this->model->Actualizar($re) :
        $re->numReservacion = $this->modelReservacion->Registrar($re);
//        

//        require_once 'view/header.php';
//        require_once 'view/usuario/reservacionUsuarioV2.php';
//        require_once 'view/footer.php';
    }
    
    
    

    public function Guardar() {
        $re = new Reservacion();

        $re->numReservacion = $_REQUEST['numReservacion'];
        echo '<script>alert("NumReserva en guardar ' . $_REQUEST['numReservacion'] . '")</script> ';
        $re->parqueNacional = $_REQUEST['selectParqueNacional'];
        $re->sector = $_REQUEST['selectSector'];
        $re->ingresoPor = $_REQUEST['transporte2'];
        //$re->fEntrada = $_REQUEST['fEntrada'];
        $re->dias = $_REQUEST['dias'];
//        $re->tipoVisita = $_REQUEST['tipoVisita'];
        $re->usuario = "Tally";
//        $re->total = $_REQUEST['totalParci'];

        $this->model->Obtener($_REQUEST['numReservacion']) ?
                        $this->model->Actualizar($re) :
                        $this->model->Registrar($re);
    }
    
    public function GuardarP() {
        $re = new Reservacion();

        $re->numReservacion = $_REQUEST['numReservacion'];
        $re->parqueNacional = $_REQUEST['selectParqueNacional'];
        $re->sector = $_REQUEST['selectSector'];
        $re->ingresoPor = $_REQUEST['transporte2'];
        //$re->fEntrada = $_REQUEST['fEntrada'];
        $re->dias = $_REQUEST['dias'];
//        $re->tipoVisita = $_REQUEST['tipoVisita'];
        $re->usuario = "Tally";
//        $re->total = $_REQUEST['totalParci'];

        $this->model->Obtener($_REQUEST['numReservacion']) ?
                        $this->model->Actualizar($re) :
                        $this->model->Registrar($re);
    }
    
    

    public function Actualizar() {
        $re = new Reservacion();
        
        $re->numReservacion = $_REQUEST['numReservacion'];

        $re->parqueNacional = $_REQUEST['selectParqueNacional'];
        $re->sector = $_REQUEST['selectSector'];
        $re->ingresoPor = $_REQUEST['transporte2'];
        $re->fEntrada = $_REQUEST['fEntrada'];
        $re->dias = $_REQUEST['dias'];
//        $re->tipoVisita = $_REQUEST['tipoVisita'];
        $re->usuario = "Tally";
//        $re->total = $_REQUEST['totalParci'];
         $this->model->Registrar($re);
         
    }
    
    public function Registrar(){
        $re = new Reservacion();
        
//        $re->numReservacion = $this->model->obtenerLastIdR()->numReservacion + 1;
//            $re = $this->model->Obtener($_REQUEST['id']);
//        echo '<script>alert("NumReserva controller ' . $re->numReservacion . '")</script> ';
        
        require_once 'view/header.php';
        require_once 'view/usuario/reservacionUsuarioV1.php';
        require_once 'view/footer.php';
    }
    
}
