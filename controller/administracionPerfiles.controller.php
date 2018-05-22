<?php

include_once 'model/patrocinadorModel.php';

class administracionPerfilesController{
    
     private $modelP;
    
    public function __CONSTRUCT(){
        $this->modelP = new Patrocinador();
    }
    
    
    public function Index(){
        require_once 'view/Administrador/header.php';
        require_once 'view/Administrador/administracionPerfiles.php';
        require_once 'view/Administrador/footer.php';
    } 
    
    public function Agregar(){
        require_once 'view/Administrador/header.php';
        require_once 'view/Administrador/agregarPerfiles.php';
        require_once 'view/Administrador/footer.php';
    }

    public function Editar() {

        $alm = new Patrocinador();

        if (isset($_REQUEST['idPatrocinador'])) {
            $alm = $this->modelP->Obtener($_REQUEST['idPatrocinador']);
            require_once 'view/Administrador/header.php';
            require_once 'view/Administrador/editarPerfiles.php';
            require_once 'view/Administrador/footer.php';
        }
    }

//        else {
//            header('Location: ?c=administracionPerfiles');
//        }


    public function GuardarP() {
        $alm = new Patrocinador();

        $alm->idPatrocinador = $_REQUEST['idPatrocinador'];
        $alm->clave = $_REQUEST['clave'];
        $alm->correo = $_REQUEST['correo'];
        $alm->nombre = $_REQUEST['nombre'];
        $alm->telefono = $_REQUEST['tel'];
        $alm->tipo = $_REQUEST['tipo'];
        
        $this->modelP->Obtener($_REQUEST['idPatrocinador']) ?
                        header('Location: ?c=administracionPerfiles') :
                        $this->modelP->Registrar($alm);

        header('Location: ?c=administracionPerfiles');
    }
    
    public function Eliminar() {
        $this->modelP->Eliminar($_REQUEST['idPatrocinador']);    
        
        header('Location: ?c=administracionPerfiles');
    }
    
    public function Cancelar() {
        header('Location: ?c=administracionPerfiles');
    }
    
}
