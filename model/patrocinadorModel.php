<?php
require_once 'model/database.php';
class Patrocinador {

    private $pdo;
    
    public $idPatrocinador;
    public $nombre;
    public $correo;
    public $clave;
    public $tipo;
    public $telefono;

    public function __CONSTRUCT() {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function Registrar($data) {

        try {
            $sql = "INSERT INTO patrocinador (idPatrocinador,nombre,correo,clave,tipo,telefono) 
		        VALUES (?, ?, ?, ?, ?, ?)";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->idPatrocinador,
                                $data->nombre,
                                $data->correo,
                                $data->clave,
                                $data->tipo,
                                $data->telefono
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function Eliminar($id) {
        try {
            $stm = $this->pdo
                    ->prepare("DELETE FROM patrocinador WHERE idPatrocinador = ?");

            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($id) {
        try {
            $stm = $this->pdo
                    ->prepare("SELECT * FROM patrocinador WHERE idPatrocinador = ?");


            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function ValidarUsuario($email, $contrasena) {
        try {

            $stm = $this->pdo
                    ->prepare("SELECT * FROM patrocinador WHERE correo = ? and clave= ?");


            $stm->execute(array($email, $contrasena));

            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function ObtenerTipo($email) {
        try {

            $stm = $this->pdo
                    ->prepare("SELECT tipo FROM patrocinador WHERE correo = ?");


            $stm->execute(array($email));

            return $stm->fetch(PDO::FETCH_OBJ)->tipo;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function Listar() {
        try {

            $stm = $this->pdo->prepare("SELECT * FROM patrocinador");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

//        public function Registrar(Usuario $data) {
//        try {
//            $sql = "INSERT INTO usuarios (`NOMBRE`, `APELLIDOS`, `CORREO_ELECT`, `CONTRASENA`, `PAIS`, `TELEFONO`, `SEXO`) 
//		        VALUES (?, ?, ?, ?, ?, ?, ?)";
//
//            $this->pdo->prepare($sql)->execute(array(
//                $data->Nombre,
//                $data->Apellido,
//                $data->Email,
//                $data->Contrasena,
//                $data->Pais,
//                $data->Telefono,
//                $data->Sexo));
//            header('Location: index.php');
////            header('Location: index.php?c=reservacionUsuarioV1');
//            
//        } catch (Exception $e) {
//            die($e->getMessage());
//        }
//    }



//	public function Listar()
//	{
//		try
//		{
//			$result = array();
//
//			$stm = $this->pdo->prepare("SELECT * FROM ulumnos");
//			$stm->execute();
//
//			return $stm->fetchAll(PDO::FETCH_OBJ);
//		}
//		catch(Exception $e)
//		{
//			die($e->getMessage());
//		}
//	}

//    public function Obtener($email) {
//        try {
//            $stm = $this->pdo
//                    ->prepare("SELECT * FROM usuarios WHERE CORREO_ELECT = ?");
//
//
//            $stm->execute(array($email));
//            return $stm->fetch(PDO::FETCH_OBJ);
//        } catch (Exception $e) {
//            die($e->getMessage());
//        }
//    }
//    
//    public function ObtenerLogin($email) {
//        try {
//            $stm = $this->pdo
//                    ->prepare("SELECT * FROM usuarios WHERE CORREO_ELECT = ?");
//
//
//            $stm->execute(array($email));
//            return $stm->fetch(PDO::FETCH_OBJ);
//        } catch (Exception $e) {
//            die($e->getMessage());
//        }
//    }
//    
//    
//     public function Mensaje($mensaje) {
//         echo $mensaje;
//    }

//	public function Eliminar($id)
//	{
//		try 
//		{
//			$stm = $this->pdo
//			            ->prepare("DELETE FROM usuarios WHERE ID_USUARIO = ?");			          
//
//			$stm->execute(array($id));
//		} catch (Exception $e) 
//		{
//			die($e->getMessage());
//		}
//	}
//	public function Actualizar($data)
//	{
//		try 
//		{
//			$sql = "UPDATE alumnos SET 
//						Nombre          = ?, 
//						Apellido        = ?,
//                                                Correo          = ?,
//						Sexo            = ?, 
//						FechaNacimiento = ?
//				    WHERE id = ?";
//
//			$this->pdo->prepare($sql)
//			     ->execute(
//				    array(
//                                        $data->Nombre, 
//                                        $data->Apellido,
//                                        $data->Correo,
//                                        $data->Sexo,
//                                        $data->FechaNacimiento,
//                                        $data->id
//                                    )
//				);
//		} catch (Exception $e) 
//		{
//			die($e->getMessage());
//		}
//	}

	
}