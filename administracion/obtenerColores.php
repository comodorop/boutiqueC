<?php

include '../daoconexion/daoConeccion.php';
include './administracion.dao/dao.php';
$dao = new dao();
$cn = new coneccion();
$cn->Conectarse();
$codigoProducto = $_GET["codigo"];
$rs = $dao->dameColores($codigoProducto);
if ($rs == false) {
    echo '<table>'
    . '<tr><td>' . mysql_error() . '</td></tr>'
    . '</table>';
} else {
    $colores;
    $contador = 0;
//    echo '<table>';
    while ($datos = mysql_fetch_array($rs)) {

        $colores[$contador] = $datos["color"];
        $contador = $contador + 1;
//        echo '<tr>';
//        echo '<td style="background-color:#' . $datos["color"] . '">&nbsp;&nbsp;&nbsp;&nbsp;</td>';
//        $datps = '<td style="background-color:#' . $datos["color"] . '"></td>';
//        echo '<td><a><span class="glyphicon glyphicon-trash"></span></a></td>';
//        echo '</tr>';
    }
//    echo '<table>';
    
    
    echo json_encode($colores);
}