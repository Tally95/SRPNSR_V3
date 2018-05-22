<?php

require_once 'model/personaModel.php';
require_once 'model/reservacionModel.php';
require_once 'model/tipoVisitanteModel.php';

class VisitanteReservacionController {

    private $modelPersona;
    private $modelTipoV;
    private $modelReservacion;
    private $cant  = 0;
    
        
private $camas = 64;
    
   

    public function __CONSTRUCT() {
        $this->modelPersona = new Visitante();
        $this->modelTipoV = new TipoVisitante();
        $this->modelReservacion = new Reservacion();
    }

    public function Index() {
        $this->cant = $this->modelPersona->CalCantVisiPorReser($_REQUEST['numReservacion']);
        require_once 'view/header.php';
        require_once 'view/usuario/visitanteReservacion.php';
        require_once 'view/footer.php';
    }

    public function GuardarVisitantes() {
        $visi = new Visitante();
        $re = new Reservacion();
        $this->cant = $this->modelPersona->CalCantVisiPorReser($_REQUEST['numReservacion']);
        

//        echo '<script>alert("Antes: ' . $this->cant + $_REQUEST['cantidad'] . '")</script> ';
        if ($this->cant + $_REQUEST['cantidad'] <= $this->camas) {


            $visi->tipo = $_REQUEST['visitante'];
            $visi->cantidad = $_REQUEST['cantidad'];
            $visi->precio = $this->modelTipoV->ObtenerPrecio($visi->tipo)->precio;
            $visi->total = $visi->cantidad * $visi->precio;
            $visi->numReservacion = $_REQUEST['numReservacion'];
            $visi->tipoMoneda = $this->modelTipoV->ObtenerMoneda($visi->tipo);
            


            $this->modelPersona->Registrar($visi);
//            echo $this->modelPersona->convertirColonDolar(1);
        } else {
            echo '<script>alert("Esa cantidad exede la cantidad de camas!")</script> ';
        }
        $this->cant = $this->modelPersona->CalCantVisiPorReser($_REQUEST['numReservacion']);

//
//        echo '<script>alert("Despues: ' . $this->cant . '")</script> ';
        $re->numReservacion = $_REQUEST['numReservacion'];
        require_once 'view/header.php';
        require_once 'view/usuario/visitanteReservacion.php';
        require_once 'view/footer.php';
    }

    public function BorrarVisitantes() {
        $re = new Reservacion();
        $re->numReservacion = $_REQUEST['numReservacion'];
        $this->modelPersona->Eliminar($_REQUEST['idPersona']);
        $this->cant = $this->modelPersona->CalCantVisiPorReser($_REQUEST['numReservacion']);
        require_once 'view/header.php';
        require_once 'view/usuario/visitanteReservacion.php';
        require_once 'view/footer.php';
    }

    public function Confirmar() {
        $re = new Reservacion();
        $re->numReservacion = $_REQUEST['numReservacion'];
        $this->cant = $this->modelPersona->CalCantVisiPorReser($_REQUEST['numReservacion']);
        if ($this->cant >= 1) {
            require_once 'view/header.php';
            require_once 'view/usuario/reservacionUsuarioV2.php';
            require_once 'view/footer.php';
        } else {
            echo '<script>alert("Debe registrar almenos un visitante!")</script> ';
            require_once 'view/header.php';
            require_once 'view/usuario/visitanteReservacion.php';
            require_once 'view/footer.php';
        }


//        echo '<script>alert("asignando en confir ' . $_REQUEST['numReservacion'] . '")</script> ';
        

//        echo '<script>alert("luego de asignando en confir ' . $re->numReservacion . '")</script> ';
        
    }
    
    public function Cancelar() {

        $this->modelPersona->EliminarPorNumReser($_REQUEST['numReservacion']);
        $this->modelReservacion->Eliminar($_REQUEST['numReservacion']);
        require_once 'view/header.php';
        require_once 'view/usuario/reservacionUsuarioV1.php';
        require_once 'view/footer.php';
    }
    
    public function Atras() {
        $reservacion = new Reservacion();
        $reservacion = $this->modelReservacion->Obtener($_REQUEST['numReservacion']);
        
        require_once 'view/header.php';
        require_once 'view/usuario/reservacionUsuarioV1.php';
        require_once 'view/footer.php';
    }

}
