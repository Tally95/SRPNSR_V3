<?php

require_once 'model/patrocinadorModel.php';
require_once 'model/database.php';
include_once 'model/administracionReservacionModel.php';

class LoginController {
    
    private $modelP;
    private $model;

    public function __CONSTRUCT() {
        $this->modelP = new Patrocinador();
        $this->model = new AdmiReservaciones();
    }

    public function Index() {
        require_once 'view/Administrador/headerLogin.php';
        require_once 'view/administrador/login.php';
        require_once 'view/Administrador/footer.php';
    }

    public function ValidarLogin() {

        $p = new Patrocinador();
        session_start();

        $usuario = $_POST['email'];
        $contrasena = $_POST['pass'];

//        $contEncrip = sha1($contrasena);
//        require_once 'modelo/database.php';
//        require_once 'modelo/usuarioModel.php';
//        $client = new Usuario();

        $obj = $this->modelP->ValidarUsuario($usuario, $contrasena);

        if ($obj != null) {

//            
//            $_SESSION['nomUsuario'] = $obj->NOMBRE . " " . $obj->APELLIDOS;
            $_SESSION['id'] = $obj->idPatrocinador;
            $_SESSION['email'] = $obj->correo;
            $_SESSION['Expiracion'] = time() + 1;
            $_SESSION['Logged'] = 'true';

            $tipo = $this->modelP->ObtenerTipo($usuario);
            $p->tipo = $tipo;
//            echo '<script>alert("Bienvenido ' . $_SESSION['email'] . '")</script> ';
            if ($tipo == "Administrador") {
//                echo "<script>location.href='?c=administracionDeReservaciones&a=Index'</script>";

                require_once 'view/Administrador/header.php';
                require_once 'view/Administrador/administracionDeReservaciones.php';
                require_once 'view/Administrador/footer.php';
            } else {
//                echo "<script>location.href='?c=administracionDeReservaciones&a=IndexSuplente'</script>";
                
                require_once 'view/Administrador/headerSuplente.php';
                require_once 'view/Administrador/administracionDeReservaciones.php';
                require_once 'view/Administrador/footer.php';
            }

//            echo '<script>alert("Bienvenido ' . $_SESSION['email'] . '")</script> ';
//             echo "id de usuario:".$_SESSION['email'];
//            header("Location: index.php");
            
         
            
        } else {

            echo '<script>alert("El email o la clave son incorrectas")</script> ';
            echo "<script>location.href='index.php'</script>";
        }

//        $username = $_POST['mail'];
//        $pass = $_POST['pass'];
//
////	$sql= $model->Obtener($username);
//
//$result=mysql_query("SELECT * FROM usuarios WHERE CORREO_ELECT = '$username'");
//$numFilas = mysql_num_rows($result);
//        if ($numFilas == 1) {
//            $row = $sql->fetch_array(MYSQLI_ASSOC);
//            if (password_verify($pass, $row['CONTRASENA'])) {
//                echo '<script>alert("Datos Correctos")</script> ';
//		echo "<script>location.href='reservacionUsuarioV1.php'</script>";
//                $_SESSION['loggedin'] = true;
//                $_SESSION['username'] = $username;
//                $_SESSION['start'] = time();
//                $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
//                echo "Bienvenido! " . $_SESSION['username'];
//                echo "<br><br><a href=panel-control.php>Panel de Control</a>";
//            } else {
//                
//                echo "Username o Password estan incorrectos.";
//                echo "<script>location.href='index.php'</script>";
//            }
//        }else{		
//		echo '<script>alert("ESTE USUARIO NO EXISTE, PORFAVOR REGISTRESE PARA PODER INGRESAR ")</script> ';
//		echo "<script>location.href='index.php'</script>";
//	}
//        $sql=mysql_query("SELECT * FROM usuarios WHERE CORREO_ELECT = '$username'");  
//        $f=mysql_fetch_array($sql);
//	if($f) {
//		if($pass==$f['CONTRASENA']){
//			header("Location: reservacionUsuarioV1.php");
//		}else{
//			echo '<script>alert("CONTRASEÃ‘A INCORRECTA")</script> ';		
////			header("Location: reservacionUsuarioV1.php");
//		}
//	}else{		
//		echo '<script>alert("ESTE USUARIO NO EXISTE, PORFAVOR REGISTRESE PARA PODER INGRESAR ")</script> ';
//		echo "<script>location.href='index.php'</script>";
//	}
    }

}
