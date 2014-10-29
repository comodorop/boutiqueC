<?php
include './administracion.dao/dao.php';
$dao = new dao();
$talla = $_GET["nombreTalla"];
$rs = $dao->guardartallas($talla);
if($rs == false){
    echo '1,'. mysql_error();
}
else{
    echo 0;
}
