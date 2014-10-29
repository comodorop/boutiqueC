<?php

include './administracion.dao/dao.php';
$dao = new dao();
$rs = $dao->dameMaterial();
if ($rs == false) {
    echo '<select>';
    echo '<option>';
    echo mysql_error();
    echo '<option>';
    echo '</select>';
} else {
    echo '<select>';
    echo '<option value="0">Seleccione un Material</option>';
    while ($datos = mysql_fetch_array($rs)) {
        echo '<option value="' . $datos["idTipoMaterial"] . '">';
        echo $datos["tiposMaterial"];
        echo '</option>';
    }
    echo '</select>';
}