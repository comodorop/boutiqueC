function dameProductosCategoria(idgrupo, idcategoria) {
    $("#mostrarProductos").load("dameProductos.php?idGrupo="+idgrupo+"&idCategoria="+idcategoria);
}