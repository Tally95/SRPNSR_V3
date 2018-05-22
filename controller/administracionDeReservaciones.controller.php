<?php


require_once 'model/personaModel.php';
include_once 'model/administracionReservacionModel.php';
require_once 'model/patrocinadorModel.php';
include_once 'model/reservacionModel.php';


class AdministracionDeReservacionesController {

    private $model;
    private $modelReservacion;
    private $modelPersona;

    public function __CONSTRUCT() {
        $this->modelPersona = new Visitante();
        $this->model = new AdmiReservaciones();
        $this->modelReservacion = new Reservacion();
    }

    public function Index() {
        $p = new Patrocinador();
//        $p->tipo = $_REQUEST['tipo'];
        
        if ($p->tipo == "Suplente") {
            require_once 'view/Administrador/headerSuplente.php';
        } else {
            require_once 'view/Administrador/header.php';
        }
        
        
        require_once 'view/Administrador/administracionDeReservaciones.php';
        require_once 'view/Administrador/footer.php';
    }

   
    
    public function Agregar() {
        header("Location: http://localhost/SRPNSR_V3_Union/index.php");
    }

    public function Eliminar() {
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: ?c=administracionDeReservaciones');
    }

    public function Visitantes() {
        $re = $_REQUEST['id'];
        
        
        require_once 'view/Administrador/header.php';
        require_once 'view/Administrador/ordenarVisitantes.php';
        require_once 'view/Administrador/footer.php';
    }

    public function Editar() {
        $alm = new AdmiReservaciones();

        if (isset($_REQUEST['id'])) {
            $alm = $this->model->Obtener($_REQUEST['id']);
        }

        require_once 'view/Administrador/header.php';
        require_once 'view/Administrador/administracionDeReservaciones-editar.php';
        require_once 'view/Administrador/footer.php';
    }
    
    public function Servicios() {
        $re = $_REQUEST['id'];
        
        
        require_once 'view/Administrador/header.php';
        require_once 'view/Administrador/servisios.php';
        require_once 'view/Administrador/footer.php';
    }
    
    public function Detalles() {
        $alm  = new Reservacion();
        
        $alm  = $this->modelReservacion->Obtener($_REQUEST['id']);

        require_once 'view/Administrador/header.php';
        require_once 'view/Administrador/detallesReservacion.php';
        require_once 'view/Administrador/footer.php';
    }

    public function Aceptar() {
        $re = new Reservacion();
        $re->numReservacion = $_REQUEST['id'];
        $re->estado = "Completa";
        $this->modelReservacion->CambioSoloEstado($re);

        require_once 'view/Administrador/header.php';
        require_once 'view/Administrador/administracionDeReservaciones.php';
        require_once 'view/Administrador/footer.php';
    }

    public function Registrar() {
        $alm = new AdmiReservaciones();

        if (isset($_REQUEST['numReservacion'])) {
            $alm = $this->model->Obtener($_REQUEST['numReservacion']);
        }

        require_once 'view/Administrador/header.php';
        require_once 'view/Administrador/administracionDeReservaciones.php';
        require_once 'view/Administrador/footer.php';
    }

    public function Guardar() {
        $alm = new AdmiReservaciones();


        $alm->numReservacion = $_REQUEST['numReservacion'];
        $alm->parqueNacional = $_REQUEST['parqueNacional'];
        $alm->sector = $_REQUEST['sector'];
        $alm->ingresoPor = $_REQUEST['tipoIngreso'];
        $alm->fEntrada = $_REQUEST['fEntrada'];
        $alm->dias = $_REQUEST['dias'];
        $alm->tipoVisita = $_REQUEST['tipoVisita'];
        $alm->usuario = $_REQUEST['usuario'];
        $alm->total = $_REQUEST['total'];
//        $alm->Estado = $_REQUEST['Estado'];

        $this->model->Obtener($_REQUEST['numReservacion']) ?
                        $this->model->Actualizar($alm) :
                        $this->model->Registrar($alm);

        header('Location: ?c=administracionDeReservaciones');
    }

}
