<?php


include_once 'model/database.php';
require './Assets/Classes/PHPExcel.php';

class Reporte{

    private $pdo;
   

    public function __CONSTRUCT() {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function ExcelDescarga($parque, $sector, $mes, $anno, $nombre) {

        try {
            if ($parque == 0 && $sector == 0 && $mes == 0 && $anno == 0) {
                $sql = "SELECT * FROM reservacion WHERE estado = 'Completa'";
                $resultado = $this->pdo->prepare($sql);
                $resultado->execute();
            } else

            if ($parque == 0 && $sector == 0 && $mes == 0) {
                $sql = "SELECT * FROM reservacion "
                        . "WHERE annoE = ? and estado = 'Completa'";
                $resultado = $this->pdo->prepare($sql);
                $resultado->execute(array($anno));
            } else
            if ($parque == 0 && $sector == 0) {
                $sql = "SELECT * FROM reservacion "
                        . "WHERE mesE = ? and annoE = ?"
                        . " and estado = 'Completa'";
                $resultado = $this->pdo->prepare($sql);
                $resultado->execute(array($mes, $anno));
            } else
            if ($parque == 0) {
                $sql = "SELECT * FROM reservacion "
                        . "WHERE sector = ? and mesE = ?"
                        . "and annoE = ? and estado = 'Completa'";
                $resultado = $this->pdo->prepare($sql);
                $resultado->execute(array($sector, $mes, $anno));
            }

            $fila = 2;
            
            $objPHPExcel = new PHPExcel();
            $objPHPExcel->getProperties()->setCreator("Kim y Tally")
                    ->setDescription("Reportes de Reservacion");

            $objPHPExcel->setActiveSheetIndex(0);
            $objPHPExcel->getActiveSheet()->setTitle($nombre);

            $objPHPExcel->getActiveSheet()
                    ->setCellValue('A1', 'Numero Reservacion');
            $objPHPExcel->getActiveSheet()
                    ->setCellValue('B1', 'Parque');
            $objPHPExcel->getActiveSheet()
                    ->setCellValue('C1', 'Sector');
            $objPHPExcel->getActiveSheet()
                    ->setCellValue('D1', 'Ingreso');
            $objPHPExcel->getActiveSheet()
                    ->setCellValue('E1', 'Fecha de Entrada');
            $objPHPExcel->getActiveSheet()
                    ->setCellValue('F1', 'Tipo de Visita');
            $objPHPExcel->getActiveSheet()
                    ->setCellValue('G1', 'Usuario Solicitante');
            $objPHPExcel->getActiveSheet()
                    ->setCellValue('H1', 'Email');
            $objPHPExcel->getActiveSheet()
                    ->setCellValue('I1', 'Total');



            foreach ($resultado->fetchAll(PDO::FETCH_OBJ) as $row):
                $objPHPExcel->getActiveSheet()
                        ->setCellValue('A' . $fila, $row->numReservacion);
                $objPHPExcel->getActiveSheet()
                        ->setCellValue('B' . $fila, $row->parqueNacional);
                $objPHPExcel->getActiveSheet()
                        ->setCellValue('C' . $fila, $row->sector);
                $objPHPExcel->getActiveSheet()
                        ->setCellValue('D' . $fila, $row->ingresoPor);
                $objPHPExcel->getActiveSheet()
                        ->setCellValue('E' . $fila, $row->fEntrada);
                $objPHPExcel->getActiveSheet()
                        ->setCellValue('F' . $fila, $row->tipoVisita);
                $objPHPExcel->getActiveSheet()
                        ->setCellValue('G' . $fila, $row->nombreUsuario);
                $objPHPExcel->getActiveSheet()
                        ->setCellValue('H' . $fila, $row->emailUsuario);
                $objPHPExcel->getActiveSheet()
                        ->setCellValue('I' . $fila, $row->total);

                $fila++;
            endforeach;





            header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header('Content-Disposition: attachment;filename="'.$nombre.'.xlsx"');
	header('Cache-Control: max-age=0');
	
	$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        
        $objWriter->save('php://output');

            
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
//    public function Registrar($data) {
//
//        try {
//            $sql = "INSERT INTO patrocinador (idPatrocinador,nombre,correo,clave,tipo,telefono) 
//		        VALUES (?, ?, ?, ?, ?, ?)";
//
//            $this->pdo->prepare($sql)
//                    ->execute(
//                            array(
//                                $data->idPatrocinador,
//                                $data->nombre,
//                                $data->correo,
//                                $data->clave,
//                                $data->tipo,
//                                $data->telefono
//                            )
//            );
//        } catch (Exception $e) {
//            die($e->getMessage());
//        }
//    }
//    
//    public function Eliminar($id) {
//        try {
//            $stm = $this->pdo
//                    ->prepare("DELETE FROM patrocinador WHERE idPatrocinador = ?");
//
//            $stm->execute(array($id));
//        } catch (Exception $e) {
//            die($e->getMessage());
//        }
//    }
//
//    public function Obtener($id) {
//        try {
//            $stm = $this->pdo
//                    ->prepare("SELECT * FROM patrocinador WHERE idPatrocinador = ?");
//
//
//            $stm->execute(array($id));
//            return $stm->fetch(PDO::FETCH_OBJ);
//        } catch (Exception $e) {
//            die($e->getMessage());
//        }
//    }
//    
//    public function ValidarUsuario($email, $contrasena) {
//        try {
//
//            $stm = $this->pdo
//                    ->prepare("SELECT * FROM patrocinador WHERE correo = ? and clave= ?");
//
//
//            $stm->execute(array($email, $contrasena));
//
//            return $stm->fetch(PDO::FETCH_OBJ);
//        } catch (Exception $e) {
//            die($e->getMessage());
//        }
//    }
//    
//    public function Listar() {
//        try {
//
//            $stm = $this->pdo->prepare("SELECT * FROM patrocinador");
//            $stm->execute();
//
//            return $stm->fetchAll(PDO::FETCH_OBJ);
//        } catch (Exception $e) {
//            die($e->getMessage());
//        }
//    }

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