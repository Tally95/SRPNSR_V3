<?php 
require_once '../../../model/BDSelect.php';

function getSector(){
  $mysqli = getConn();
  $id = $_POST['id'];
  $query = "SELECT * FROM `sector` WHERE parque = $id";
  $result = $mysqli->query($query);
  $sector = '<option value="0">Seleccione...</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $sector .= "<option value='$row[id]'>$row[nombre]</option>";
  }
  return $sector;
}

echo getSector();
