<?php

//echo '<script>alert("get sectores ")</script> ';
require ('conexion.php');

$id_Parque = $_POST['id_Parque'];
echo '<script>alert("get sectores ")</script> ';
$queryM = "SELECT * FROM sector WHERE parque = '$id_Parque'";
$resultadoM = $mysqli->query($queryM);

$html = "<option value='0'>Seleccionar Municipio</option>";

while ($rowM = $resultadoM->fetch_assoc()) {
    $html.= "<option value='" . $rowM['id'] . "'>" . $rowM['nombre'] . "</option>";
}

echo $html;
?>