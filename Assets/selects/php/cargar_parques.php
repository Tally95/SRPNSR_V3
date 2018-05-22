<?php 
require_once '../../../model/BDSelect.php';

function getListasParque(){
  $mysqli = getConn();
  $query = 'SELECT * FROM `parque`';
  $result = $mysqli->query($query);
  $parque = '<option value="0">Seleccione...</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $parque .= "<option value='$row[numParque]'>$row[nomParque]</option>";
  }
  return $parque;
}

echo getListasParque();