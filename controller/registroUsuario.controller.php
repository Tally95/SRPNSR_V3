<?php
    require_once 'model/usuarioModel.php';
    
class RegistroUsuarioController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Usuario();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/usuario/registroUsuario.php';
        require_once 'view/footer.php';

    }   
    
    public function Guardar() {
        $usuario = new Usuario();

        $usuario->Nombre = $_REQUEST['nombre'];
        $usuario->Apellido = $_REQUEST['apellidos'];
        $usuario->Contrasena = $_REQUEST['contra'];
        $usuario->Email = $_REQUEST['email'];
        $usuario->Pais = $_REQUEST['pais'];
        $usuario->Sexo = $_REQUEST['sexo'];
        $usuario->Telefono = $_REQUEST['tel'];
        
        $this->model->Obtener($_REQUEST['email']) ?
                        $this->model->Mensaje('El Usuario ya existe') : $this->model->Registrar($usuario);
    }

//    
//    public function Editar(){
//        $alm = new Usuario();
//        
//        if(isset($_REQUEST['id'])){
//            $alm = $this->model->Obtener($_REQUEST['id']);
//        }
//        
//        require_once 'view/header.php';
//        require_once 'view/alumno/alumno-editar.php';
//        require_once 'view/footer.php';
//    }
//    
//    public function Registrar(){
//        $alm = new Alumno();
//        
//        if(isset($_REQUEST['id'])){
//            $alm = $this->model->Obtener($_REQUEST['id']);
//        }
//        
//        require_once 'view/header.php';
//        require_once 'view/alumno/alumno-editar.php';
//        require_once 'view/footer.php';
//    }
//    
//    
//    
//    public function Eliminar(){
//        $this->model->Eliminar($_REQUEST['id']);
//        header('Location: index.php');
//    }
    
}