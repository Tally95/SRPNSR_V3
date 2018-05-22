<?php

class Visitante {

    private $pdo;
    
    public $idPersona;
    public $tipo;
    public $precio;
    public $cantidad;
    public $total;
    public $numReservacion;
    public $tipoMoneda;

    public function __construct() {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $exc) {
            die($exc->getMessage());
        }
    }

    public function convertirDolarColon($cantidad) {
        $get = file_get_contents("https://www.google.com/finance/converter?a=".$cantidad."&from=USD&to=CRC");
        $get = explode("<span class=bld>", $get);
        $get = explode("</span>", $get[1]);
        return preg_replace("/[^0-9\.]/", null, $get[0]);
    }
    
    public function convertirColonDolar($cantidad) {
        $content = file_get_contents("https://www.google.com/finance/converter?a=$cantidad&from=CRC&to=USD");


        $doc = new DOMDocument;
        @$doc->loadHTML($content);
        $xpath = new DOMXpath($doc);
        $result = $xpath->query('//*[@id="currency_converter_result"]/span')->item(0)->nodeValue;
        return str_replace(' ' . USD, '', $result);

//        
//        $get = explode("<span class=bld>", $get);
//        $get = explode("</span>", $get[1]);
//        return preg_replace("/[^0-9\.]/", null, $get[0]);
    }

    public function Listar() {
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM personas");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            die($exc->getMessage());
        }
    }
    
    public function ListarPorReservacion($id) {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM personas where numReservacion = ?");
            $stm->execute(array($id));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            die($exc->getMessage());
        }
    }
    
    public function Registrar($data) {
        try {
            $sql = "INSERT INTO personas (idPersona, tipo, precio, cantidad, total, numReservacion, tipoMoneda)
                    VALUE (?, ?, ?, ?, ?, ?, ?)";
            $this->pdo->prepare($sql)
                    ->execute(array($data->idPersona, $data->tipo, $data->precio
                    ,$data->cantidad, $data->total, $data->numReservacion, $data->tipoMoneda));
        } catch (Exception $exc) {
            die ($exc->getMessage());
        }
    }
    
    public function Obtener($id) {
        try {
            $stm = $this->pdo->prepare("SELECT *FROM personas WHERE idPersona = ?");
            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            die($exc->getMessage());
        }
    }
    
    public function CalculoPrecioVisitantesColones($numReservacion) {
        try {

            $stm = $this->pdo->prepare("SELECT SUM(total) as total FROM personas where tipoMoneda = 'C' "
                    . "and numReservacion = ?");
            $stm->execute(array($numReservacion));

            $total = $stm->fetch(PDO::FETCH_OBJ)->total;
            
            return $total;
        } catch (Exception $exc) {
            die($exc->getMessage());
        }
    }
    
    public function CalculoPrecioVisitantesDolares($numReservacion) {
        try {

            $stm = $this->pdo->prepare("SELECT SUM(total) as total FROM personas where tipoMoneda = 'D' "
                    . "and numReservacion = ?");
            $stm->execute(array($numReservacion));

            $total = $stm->fetch(PDO::FETCH_OBJ)->total;
            
            return $total;
        } catch (Exception $exc) {
            die($exc->getMessage());
        }
    }
    
    public function CalculoPrecioTotalColon($numReservacion) {
        try {
            
            $stm = $this->pdo->prepare("SELECT SUM(total) as total FROM personas where tipoMoneda = 'C' "
                    . "and numReservacion = ?");
            $stm->execute(array($numReservacion));
            
            $stm2 = $this->pdo->prepare("SELECT dias FROM reservacion where numReservacion = ?");
            $stm2->execute(array($numReservacion));
            
            return $stm->fetch(PDO::FETCH_OBJ)->total * $stm2->fetch(PDO::FETCH_OBJ)->dias;
        } catch (Exception $exc) {
            die($exc->getMessage());
        }
    }  
    
    public function CalculoPrecioTotalDolar($numReservacion) {
        try {
            
            $stm = $this->pdo->prepare("SELECT SUM(total) as total FROM personas where tipoMoneda = 'D' "
                    . "and numReservacion = ?");
            $stm->execute(array($numReservacion));
            
            $stm2 = $this->pdo->prepare("SELECT dias FROM reservacion where numReservacion = ?");
            $stm2->execute(array($numReservacion));
            
            return $stm->fetch(PDO::FETCH_OBJ)->total * $stm2->fetch(PDO::FETCH_OBJ)->dias;
        } catch (Exception $exc) {
            die($exc->getMessage());
        }
    }
    
     public function CalCantVisiPorReser($numReservacion) {
        try {
            
            $stm = $this->pdo->prepare("SELECT SUM(cantidad) as totalPersonas FROM personas where numReservacion = ?");
            $stm->execute(array($numReservacion));
            
            $cant = $stm->fetch(PDO::FETCH_OBJ)->totalPersonas;
            
            return $cant;
        } catch (Exception $exc) {
            die($exc->getMessage());
        }
    }
    
    
    public function ListarTipo() {
        try {
          
            $stm = $this->pdo->prepare("SELECT * FROM tipovisitante");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            die($exc->getMessage());
        }
    }
    
    public function Actualizar($data) {
        try {
            $sql = "UPDATE personas SET tipo = ? ,cantidad = ? ,total = ? WHERE idPersona = ?";
            
            $this->pdo->prepare($sql)
                    ->execute(array($data->tipo, $data->cantidad, $data->total, $data->idPersona));
        } catch (Exception $exc) {
            die($exc->getMessage());
        }
    }
    
    public function EliminarPorNumReser($id) {
        try {
            $stm = $this->pdo
                    ->prepare("DELETE FROM personas WHERE numReservacion = ?");

            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function Eliminar($id) {
        try {
            $stm = $this->pdo
                    ->prepare("DELETE FROM personas WHERE idPersona = ?");

            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
}