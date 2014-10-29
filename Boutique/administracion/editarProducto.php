<?php

include './administracion.dao/dao.php';
include './administracion.clases/Producto.php';
include './administracion.clases/Costo.php';
include './administracion.clases/Tarifa.php';
session_start();
$producto = new Producto();
$costo = new Costo();
$tarifa = new Tarifa();
$dao = new dao();
$idsucursal = $_SESSION["sucursalSesion"];

$lista = json_decode(stripslashes($_GET["lista"]));
$producto->setIdUnidadMedida($_GET["unidadMedida"]);
$producto->setIdGrupoProducto($_GET["grupoProducto"]);
$producto->setCantidadMaxima($_GET["max"]);
$producto->setCantidadMinima($_GET["min"]);
$producto->setProducto($_GET["producto"]);
$producto->setIdMarca($_GET["marca"]);
$producto->setIdProveedor($_GET["proveedor"]);
$producto->setCodigoProducto($_GET["codigoProducto"]);
$costo->setCosto($_GET["costoProducto"]);
$idMaterial = $_GET["idMaterial"];
//$m3 = $_GET["m3"];
//$costo->setFolioProducto($_GET["folio"]);
$tarifa->setIdListaPrecio($lista);
$colores = json_decode(stripslashes($_GET["colores"]));


$dao->editarProducto($producto, $costo, $tarifa, $idsucursal, "", $idMaterial, $colores);

