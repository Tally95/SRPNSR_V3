<?php

require_once 'model/database.php';

class AdmiReservaciones {

    private $pdo;
    
    public $numReservacion;
    public $parqueNacional;
    public $sector;
    public $ingresoPor;
    public $fEntrada;
    public $dias;
    public $tipoVisita;     
    public $usuario;
    public $total;
    public $estado = "sinAprobar";

    public function __CONSTRUCT() {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    

    public function Listar() {
        try {

            $stm = $this->pdo->prepare("SELECT * FROM reservacion");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function ListarSA() {
        try {

            $stm = $this->pdo->prepare("SELECT * FROM reservacion WHERE estado = 'CompletaSA'");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($id) {
        try {
            $stm = $this->pdo
                    ->prepare("SELECT * FROM reservacion WHERE numReservacion = ?");


            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($id) {
        try {
            $stm = $this->pdo
                    ->prepare("DELETE FROM reservacion WHERE numReservacion = ?");

            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar($data) {
        try {
//tipoAdmision;//numReservacion;//Sector;
//Nombre;//Entrada;//Salida;  
//Puesto;//Total;//Estado;

            $sql = "UPDATE reservacion SET 
						parqueNacional = ?, sector = ?,ingresoPor= ?, fEntrada= ?,dias= ?, tipoVisita= ?, usuario= ?, total= ?, estado=? WHERE numReservacion = ?";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->parqueNacional,
                                $data->sector,
                                $data->ingresoPor,
                                $data->fEntrada,
                                $data->dias,
                                $data->tipoVisita,
                                $data->usuario,
                                $data->total,
                                $data->estado,
                                $data->numReservacion
                            )
            );
        } catch (Exception $e) {
            echo '<script>alert("error en actuliazar")</script>';
            die($e->getMessage());
        }
    }

    public function Registrar(Alumno $data) {

//tipoAdmision;//numReservacion;//Sector;
//Nombre;//Entrada;//Salida;  
//Puesto;//Total;//Estado;
        try {
            $sql = "INSERT INTO admireservaciones (numReservacion,tipoAdmision,Sector,Nombre,Entrada,Salida,Puesto,Total,Estado) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->numReservacion,
                                $data->tipoAdmision,
                                $data->Sector,
                                $data->Nombre,
                                $data->Entrada,
                                $data->Salida,
                                $data->Puesto,
                                $data->Total,
                                $data->Estado,
                                date('Y-m-d')
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}
