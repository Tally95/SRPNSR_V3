<?php

require_once 'model/personaModel.php';
require_once 'model/reservacionModel.php';
require_once 'model/tipoVisitanteModel.php';

class ReservacionUsuarioV2Controller{
    
    private $modelPersona;
    private $modelTipoV;
        private $modelReservacion;


    public function __CONSTRUCT() {
        $this->modelPersona = new Visitante();
        $this->modelTipoV = new TipoVisitante();
        $this->modelReservacion = new Reservacion();
    }
    
    public function Index(){
        
        $this->modelPersona->CalculoPrecioVisitantes($re->numReservacion);
        
        require_once 'view/header.php';
        require_once 'view/usuario/reservacionUsuarioV2.php';
        require_once 'view/footer.php';

    }
    
    public function Terminar(){

        $re = new Reservacion();
        
        $re->numReservacion = $_REQUEST['numReservacion'];
        $re->totalColones = $_REQUEST['totalPagarColones'];
        $re->totalDolares = $_REQUEST['totalPagarDolares'];
        $re->estado = "CompletaSA";

        $this->modelReservacion->CambioEstado($re);

        require_once 'view/header.php';
        require_once 'view/usuario/reservacionUsuarioV1.php';
        require_once 'view/footer.php';

    }
    
}
