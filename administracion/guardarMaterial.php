<?php
include '../daoconexion/daoConeccion.php';
$cn = new coneccion();
$tipo = $_GET["material"];
$sql="INSERT INTO tiposMaterial (tiposMaterial) VALUES ('$tipo')";
$datos = mysql_query($sql, $cn->Conectarse());
if($datos == false){
    echo mysql_error();
}
else{
    echo 'Exito, nuevo material disponible';
}