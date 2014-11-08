<?php
include '../../daoconexion/daoConeccion.php';
$cn = new coneccion();
$cn->Conectarse();
$idGrupoProducto=$_GET["idGrupo"];
$idTipo=$_GET["idCategoria"];
$sqlDameProductos = "SELECT * FROM productos p 
        INNER JOIN clasificados cl 
        on p.codigoProducto = cl.codigoProducto 
        INNER JOIN tallas t on 
        p.idtalla = t.idTalla  where p.idGrupoProducto='$idTipo' and cl.idTipo='$idGrupoProducto'  order by idProducto limit 0,12 ";
?>

<div class="col-lg-9 col-md-9 col-sm-12" id="mostrarProductos">
    <div class="w100 productFilter clearfix">
        <p class="pull-left"> Mostrando <strong>12</strong> products </p>
        <div class="pull-right ">
            <div class="change-view pull-right"> <a href="#" title="Grid" class="grid-view"> <i class="fa fa-th-large"></i> </a> <a href="#" title="List" class="list-view "><i class="fa fa-th-list"></i></a> </div>
        </div>
    </div>
    <!--/.productFilter-->
    <div class="row  categoryProduct xsResponse clearfix">

        <?php
        $datos = mysql_query($sqlDameProductos);
        if ($datos == false) {
            echo "<h1>" . mysql_error() . "</h1>";
        } else {
            while ($datosP = mysql_fetch_array($datos)) {
                $codigo = $datosP["codigoProducto"];
                ?>
                <div class="item col-sm-4 col-lg-4 col-md-4 col-xs-6">
                    <div class="product">
                        <div class="image"> 
                            <a href="product-details.php?codigoProducto=<?php echo $datosP["codigoProducto"]; ?>">
                                <img src="../../subidas/<?php echo $datosP["idProducto"]; ?>-_-0.jpg" class="img-responsive">
                                <!--<img src="images/product/30.jpg" alt="img" class="img-responsive">-->
                            </a>
                        </div>
                        <div class="description">
                            <h4>
                                <a href="product-details.php?codigoProducto=<?php echo $datosP["codigoProducto"]; ?>"><?php echo $datosP["producto"]; ?></a></h4>
                            <div class="list-description">
                                <p><?php echo $datosP["descripcion"]; ?> </p>
                            </div>
                            <span class="size">Tallas :<?php echo $datosP["talla"]; ?></span> 
                        </div>
                        <?php
                        $sqlDamePrecios = "SELECT * FROM tarifas WHERE codigoProducto = '$codigo' and idListaPrecio='1'";
                        $datosPrecio = mysql_query($sqlDamePrecios);
                        if ($datosPrecio == false) {
                            echo "<h1>" . mysql_error() . "</h1>";
                        } else {
                            while ($rsTarifas = mysql_fetch_array($datosPrecio)) {
                                ?>
                                <div class="price"> <span>$<?php echo $rsTarifas["tarifa"]; ?> mxn.</span> </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <?php
            }
        }
        ?>   
        <!--/.item-->
    </div>
    <!--/.categoryProduct || product content end-->

    <div class="w100 categoryFooter">
        <div class="pagination pull-left no-margin-top">
            <ul class="pagination no-margin-top">
                <li> <a href="#">«</a></li>
                <li class="active"><a href="#">1</a></li>
                <li> <a href="#">2</a></li>
                <li> <a href="#">3</a></li>
                <li> <a href="#">4</a></li>
                <li> <a href="#">5</a></li>
                <li> <a href="#">»</a></li>
            </ul>
        </div>
    </div>
    <!--/.categoryFooter--> 
</div>