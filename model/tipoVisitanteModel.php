<?php

class TipoVisitante {

    private $pdo;
    
    public $numTipo;
    public $tipo;
    public $precio;
    public $tipoMoneda;

    public function __construct() {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $exc) {
            die($exc->getMessage());
        }
    }
    
    public function Listar() {
        try {

            $stm = $this->pdo->prepare("SELECT * FROM tipovisitante");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            die($exc->getMessage());
        }
    }
    
    public function ObtenerPrecio($tipo) {
        try {
            $stm = $this->pdo->prepare("SELECT precio FROM tipovisitante WHERE tipo = ?");
            $stm->execute(array($tipo));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            die($exc->getMessage());
        }
    }

    public function ObtenerMoneda($tipo) {
        try {
            $stm = $this->pdo->prepare("SELECT tipoMoneda FROM tipovisitante WHERE tipo = ?");
            $stm->execute(array($tipo));
            $moneda = $stm->fetch(PDO::FETCH_OBJ)->tipoMoneda;
            return $moneda;
        } catch (Exception $exc) {
            die($exc->getMessage());
        }
    }

//    public function Registrar($data) {
//        try {
//            $sql = "INSERT INTO personas (numTipo, tipo, precio)
//                    VALUE (?, ?, ?)";
//            $this->pdo->prepare($sql)
//                    ->execute(array($data->numTipo, $data->tipo, $data->precio));
//        } catch (Exception $exc) {
//            die ($exc->getMessage());
//        }
//    }
//    
//    public function Obtener($id) {
//        try {
//            $stm = $this->pdo->prepare("SELECT *FROM personas WHERE idPersona = ?");
//            $stm->execute(array($id));
//            return $stm->fetch(PDO::FETCH_OBJ);
//        } catch (Exception $exc) {
//            die($exc->getMessage());
//        }
//    }
//    
//    public function ListarTipo() {
//        try {
//          
//            $stm = $this->pdo->prepare("SELECT * FROM tipovisitante");
//            $stm->execute();
//            return $stm->fetchAll(PDO::FETCH_OBJ);
//        } catch (Exception $exc) {
//            die($exc->getMessage());
//        }
//    }
//    
//    public function Actualizar($data) {
//        try {
//            $sql = "UPDATE personas SET tipo = ? ,cantidad = ? ,total = ? WHERE idPersona = ?";
//            
//            $this->pdo->prepare($sql)
//                    ->execute(array($data->tipo, $data->cantidad, $data->total, $data->idPersona));
//        } catch (Exception $exc) {
//            die($exc->getMessage());
//        }
//    }
//    
//    public function Eliminar($id) {
//        try {
//            $stm = $this->pdo
//                    ->prepare("DELETE FROM personas WHERE idPersona = ?");
//
//            $stm->execute(array($id));
//        } catch (Exception $e) {
//            die($e->getMessage());
//        }
//    }
    
}