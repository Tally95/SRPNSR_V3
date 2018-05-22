<?php
require_once 'model/database.php';
class Reservacion {

    private $pdo;

    public $numReservacion;
    
    public $parqueNacional;
    public $sector;
    public $ingresoPor;
    public $fEntrada;
    
    public $diaE;
    public $mesE;
    public $annoE;
    
    public $fSalida;
    public $dias;
    public $tipoVisita;  
    public $nombreUsuario;
    public $emailUsuario;
    public $totalColones = 0; 
    public $totalDolares = 0; 
    public $estado;

    public $alimentacion = "NO";
    public $laboratorio = "NO";
    public $lavanderia = "NO";
    public $sendero = "NO";
    public $charla = "NO";
    public $aulaConferencia = "NO";

    public function __CONSTRUCT() {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtenerLastIdReser() {
        try {
            $stm = $this->pdo
                    ->prepare("SELECT numReservacion from reservacion where numReservacion=(select MAX(numReservacion) from reservacion);");
            $stm->execute();
            return $stm->fetch(PDO::FETCH_OBJ);
            
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar($data) {
        try {           
            
            $sql = "INSERT INTO reservacion (parqueNacional, sector, ingresoPor,
                fEntrada, diaE, mesE, annoE, fSalida, dias, tipoVisita, nombreUsuario, emailUsuario, totalColones, totalDolares, 
                estado, alimentacion,
                laboratorio, lavanderia, senderos, charla, aulaConferencia)
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $this->pdo->prepare($sql)->execute(array(
                $data->parqueNacional,
                $data->sector,
                $data->ingresoPor,
                $data->fEntrada,
                $data->diaE,
                $data->mesE,
                $data->annoE,
                $data->fSalida,
                $data->dias,
                $data->tipoVisita,
                $data->nombreUsuario,
                $data->emailUsuario,
                $data->totalColones,
                $data->totalDolares,
                $data->estado, 
                $data->alimentacion, 
                $data->laboratorio, 
                $data->lavanderia, 
                $data->sendero, 
                $data->charla, 
                $data->aulaConferencia));
            //header('Location: index.php?c=reservacionUsuarioV2');
           $ultimoId = $this->obtenerLastIdReser();
            
//            $ultimoId = $this->obtenerLastIdR()->numReservacion;
//            echo '<script>alert("Id de la reserva ' . $ultimoId . '")</script> ';
//            
            return $ultimoId->numReservacion;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function Actualizar($data) {
        try {
            $sql = "UPDATE reservacion SET parqueNacional = ?, sector = ?,ingresoPor = ?,fEntrada = ?,dias = ?,tipoVisita = ?,usuario = ?,total = ?,estado = ? WHERE numReservacion = ?";

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
                                $data->numReservacion));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    
    public function CambioEstado($data) {
        try {
            $sql = "UPDATE reservacion SET estado = ?, totalColones = ?, totalDolares = ? WHERE numReservacion = ?";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(                                
                                $data->estado,
                                $data->totalColones,
                                $data->totalDolares,
                                $data->numReservacion));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function CambioSoloEstado($data) {
        try {
            $sql = "UPDATE reservacion SET estado = ? WHERE numReservacion = ?";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(                                
                                $data->estado,
                                $data->numReservacion));
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

    public function Obtener($id) {
//        echo '<script>alert("obtener en el model'. $id.'")</script>';
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

    public function ListarParque() {
        try {

            $stm = $this->pdo->prepare("SELECT * FROM parque");
            $stm->execute();           

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function ListarSector() {
        try {

            $stm = $this->pdo->prepare("SELECT * FROM sector");
            $stm->execute();           

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ListarTipoVisita() {
        try {

            $stm = $this->pdo->prepare("SELECT * FROM tipovisita");
            $stm->execute();           

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function ListarA() {
        try {

            $stm = $this->pdo->prepare("SELECT * FROM reservacion WHERE estado = 'Completa'");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
