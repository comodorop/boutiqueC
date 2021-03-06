<?php

session_start();
include_once '../daoconexion/daoConeccion.php';
include './administracion.dao/dao.php';
$cn = new coneccion();
$dao = new dao();

$sucursal = $_SESSION["sucursalSesion"];

$cn->Conectarse();
$datos = $dao->consultarDeudores($sucursal);
if ($datos == 0) {
    echo 'ERROR: NO SE PUDIERON CARGAR LOS DATOS';
} else {
    echo"<div class='table-responsive'><table class='table table-hover' id='dtdeudores'><thead><th>Nombre</th><th>Folio</th><th>Limite de credito</th><th>Credito</th><th>Saldo</th></thead><tbody>";
    while ($rs = mysql_fetch_array($datos)) {
        echo"<tr><td>$rs[nombre]</td>";
        echo"<td>$rs[folioComprobante]</td>";
        echo"<td style='text-align:right'>$".number_format($rs['credito'],2)."</td>";
        echo"<td><input type='text' class='creditos form-control' value='$rs[totalComprobante]' disabled/></td>";
        echo"<td><input type='text' class='saldos form-control' value='$rs[saldo]' disabled/></td></tr>";
    }
    echo"</tbody></table></div>";
}



