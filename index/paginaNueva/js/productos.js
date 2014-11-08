function dameProductosCategoria(idgrupo, idcategoria) {
    alert("clic");
    $("#mostrarProductos").load("dameProductos.php?idGrupo="+idgrupo+"&idCategoria="+idcategoria);
}