<?php

include './administracion.dao/dao.php';
$dao = new dao();
$rs = $dao->mostrarTallas();
if ($rs == false) {
    echo '<select>'
    . '<option>' . mysql_error() . '</option>'
    . '</select>';
} else {
    echo '<select>';
    echo '<option value="0" >Seleccione una Talla</option>';
    while ($datos = mysql_fetch_array($rs)) {
        echo '<option value ="'.$datos[0].'">'.$datos[1].'</option>';
    }
    echo '</select>';
}