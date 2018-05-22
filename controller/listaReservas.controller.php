<?php

include_once 'model/reservacionModel.php';
include_once 'model/personaModel.php';

class ListaReservasController {

    private $modelReservacion;
    private $modelPersona;

    public function __CONSTRUCT() {
        $this->modelReservacion = new Reservacion();
        $this->modelPersona = new Visitante();
    }

    public function Index(){
        require_once 'view/Administrador/header.php';
        require_once 'view/Administrador/listaReservas.php';
       require_once 'view/Administrador/footer.php';
    }     
    
    public function Visitantes() {
        $re = $_REQUEST['id'];
        
        
        require_once 'view/Administrador/header.php';
        require_once 'view/Administrador/listaVisitantes.php';
        require_once 'view/Administrador/footer.php';
    }
    
    public function Servicios() {
        $re = $_REQUEST['id'];
        
        
        require_once 'view/Administrador/header.php';
        require_once 'view/Administrador/listaServicios.php';
        require_once 'view/Administrador/footer.php';
    }
    
    public function Detalles() {
        $alm  = new Reservacion();
        
        $alm  = $this->modelReservacion->Obtener($_REQUEST['id']);

        require_once 'view/Administrador/header.php';
        require_once 'view/Administrador/detallesReservacion.php';
        require_once 'view/Administrador/footer.php';
    }
}
