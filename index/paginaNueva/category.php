<?php
include '../../daoconexion/daoConeccion.php';
$cn = new coneccion();
$cn->Conectarse();
$sqlDameProductos = "SELECT * FROM productos p 
        INNER JOIN clasificados cl 
        on p.codigoProducto = cl.codigoProducto 
        INNER JOIN tallas t on 
        p.idtalla = t.idTalla  order by idProducto limit 0,12 ";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <title>TSHOP - Bootstrap E-Commerce Parallax Theme</title>
        <!-- Bootstrap core CSS -->
        <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">

        <!-- styles needed by minimalect -->
        <link href="assets/css/jquery.minimalect.min.css" rel="stylesheet">
        <!-- styles needed by checkRadio -->
        <link href="assets/css/ion.checkRadio.css" rel="stylesheet">
        <link href="assets/css/ion.checkRadio.cloudy.css" rel="stylesheet">
        <!-- styles needed by mCustomScrollbar -->
        <link href="assets/css/jquery.mCustomScrollbar.css" rel="stylesheet">

        <!-- Just for debugging purposes. -->
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
              <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <!-- include pace script for automatic web page progress bar  -->

        <script>
            paceOptions = {
                elements: true
            };
        </script>
        <script src="assets/js/pace.min.js"></script>
    </head>

    <body>


        <!-- Fixed navbar start -->
        <?php
        include './menu.php';
        ?>
        <!-- /.Fixed navbar  -->
        <div class="container main-container headerOffset"> 

            <!-- Main component call to action -->

            <div class="row">
                <div class="breadcrumbDiv col-lg-12">
                    <ul class="breadcrumb">
                        <li> <a href="index.html">Home</a> </li>
                        <li class="active">MEN COLLECTION </li>
                    </ul>
                </div>
            </div>
            <!-- /.row  -->

            <div class="row"> 

                <!--left column-->

                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="panel-group" id="accordionNo"> 
                        <!--Category-->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"> 
                                    <a data-toggle="collapse"  href="#collapseCategory" class="collapseWill"> 
                                        <span class="pull-left"> 
                                            <i class="fa fa-caret-right"></i>
                                        </span> Categoria </a> 
                                </h4>
                            </div>
                            <div id="collapseCategory" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <ul class="nav nav-pills nav-stacked tree">
                                        <?php
                                        $sqlDameGrupos = "SELECT * FROM grupoproductos ";
//                                                . "gp inner join tiposproducto tp on gp.idGrupoProducto  = tp.idGrupoProducto";

                                        $datos = mysql_query($sqlDameGrupos);
                                        if ($datos == false) {
                                            echo '<h1>' . mysql_error() . '</1>';
                                        } else {
                                            while ($rsGrupo = mysql_fetch_array($datos)) {
                                                $idGrupo = $rsGrupo["idGrupoProducto"];
                                                $sqlDameTotalgrupos = "SELECT count(TiposProducto) as total FROM grupoproductos gp inner join tiposproducto tp on "
                                                        . "gp.idGrupoProducto  = tp.idGrupoProducto WHERE gp.idGrupoProducto = '$idGrupo'";
                                                $datosToal = mysql_query($sqlDameTotalgrupos);
                                                if ($datosToal == false) {
                                                    echo '<h1>' . mysql_error() . '</h1>';
                                                } else {
                                                    while ($r = mysql_fetch_array($datosToal)) {
                                                        $total = $r["total"];
                                                    }
                                                }
                                                ?>
                                                <li class="active dropdown-tree open-tree" > <a  class="dropdown-tree-a" > 
                                                        <span class="badge pull-right"><?php echo $total; ?></span> <?php echo $rsGrupo["grupoProducto"]; ?> </a>
                                                    <ul class="category-level-2 dropdown-menu-tree">
                                                        <?php
                                                        $sqlTipoProducto = "SELECT * FROM tiposproducto WHERE idGrupoProducto='$idGrupo'";
                                                        $ra = mysql_query($sqlTipoProducto);
                                                        while ($datosTipoProduco = mysql_fetch_array($ra)) {
                                                            ?>
                                                        <li> <a onclick="dameProductosCategoria('<?php echo $datosTipoProduco["idTiposProducto"];?>', '<?php echo $datosTipoProduco["idGrupoProducto"];   ?>')"><?php echo $datosTipoProduco["TiposProducto"]; ?></a> </li>
                                                        <?php } ?>
                                                    </ul>
                                                </li>

                                                <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--right column-->
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
                        <div class="pull-right pull-right col-sm-4 col-xs-12 no-padding text-right text-left-xs">
                            <p>Showing 1–450 of 12 results</p>
                        </div>
                    </div>
                    <!--/.categoryFooter--> 
                </div>
                <!--/right column end--> 
            </div>
            <!-- /.row  --> 
        </div>
        <!-- /main container -->

        <div class="gap"> </div>
        <footer>
            <div class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3  col-md-3 col-sm-4 col-xs-6">
                            <h3> Support </h3>
                            <ul>
                                <li class="supportLi">
                                    <p> Lorem ipsum dolor sit amet, consectetur </p>
                                    <h4> <a class="inline" href="callto:+8801680531352"> <strong> <i class="fa fa-phone"> </i> 88 01680 531352 </strong> </a> </h4>
                                    <h4> <a class="inline" href="mailto:help@tshopweb.com"> <i class="fa fa-envelope-o"> </i> help@tshopweb.com </a> </h4>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                            <h3> Shop </h3>
                            <ul>
                                <li> <a href="index.html"> Home </a> </li>
                                <li> <a href="category.html"> Category </a> </li>
                                <li> <a href="sub-category.html"> Sub Category </a> </li>
                            </ul>
                        </div>
                        <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                            <h3> Information </h3>
                            <ul>
                                <li> <a href="product-details.html"> Product Details </a> </li>
                                <li> <a href="product-details-style2.html"> Product Details Version 2 </a> </li>
                                <li> <a href="cart.html"> Cart </a> </li>
                                <li> <a href="about-us.html"> About us </a> </li>
                                <li> <a href="about-us-2.html"> About us 2 </a> </li>
                                <li> <a href="contact-us.html"> Contact us </a> </li>
                                <li> <a href="contact-us-2.html"> Contact us 2 </a> </li>
                                <li> <a href="terms-conditions.html"> Terms &amp; Conditions </a> </li>
                            </ul>
                        </div>
                        <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                            <h3> My Account </h3>
                            <ul>
                                <li> <a href="account-1.html"> Account Login </a> </li>
                                <li> <a href="account.html"> My Account </a> </li>
                                <li> <a href="my-address.html"> My Address </a> </li>
                                <li> <a href="wishlist.html"> Wisth list </a> </li>
                                <li> <a href="order-list.html"> Order list </a> </li>
                            </ul>
                        </div>
                        <div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 ">
                            <h3> Stay in touch </h3>
                            <ul>
                                <li>
                                    <div class="input-append newsLatterBox text-center">
                                        <input type="text" class="full text-center"  placeholder="Email ">
                                        <button class="btn  bg-gray" type="button"> Subscribe <i class="fa fa-long-arrow-right"> </i> </button>
                                    </div>
                                </li>
                            </ul>
                            <ul class="social">
                                <li> <a href="http://facebook.com"> <i class=" fa fa-facebook"> &nbsp; </i> </a> </li>
                                <li> <a href="http://twitter.com"> <i class="fa fa-twitter"> &nbsp; </i> </a> </li>
                                <li> <a href="https://plus.google.com"> <i class="fa fa-google-plus"> &nbsp; </i> </a> </li>
                                <li> <a href="http://youtube.com"> <i class="fa fa-pinterest"> &nbsp; </i> </a> </li>
                                <li> <a href="http://youtube.com"> <i class="fa fa-youtube"> &nbsp; </i> </a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <p class="pull-left"> &copy; TSHOP 2014. All right reserved. </p>
                    <div class="pull-right paymentMethodImg"> <img height="30" class="pull-right" src="images/site/payment/master_card.png" alt="img" > <img height="30" class="pull-right" src="images/site/payment/paypal.png" alt="img" > <img height="30" class="pull-right" src="images/site/payment/american_express_card.png" alt="img" > <img  height="30" class="pull-right" src="images/site/payment/discover_network_card.png" alt="img" > <img  height="30" class="pull-right" src="images/site/payment/google_wallet.png" alt="img" > </div>
                </div>
            </div>
        </footer>

        <!-- Le javascript
        ================================================== --> 

        <!-- Placed at the end of the document so the pages load faster --> 
        <script type="text/javascript" src="assets/js/jquery/1.8.3/jquery.js"></script> 
        <script src="assets/bootstrap/js/bootstrap.min.js"></script> 

        <!-- include  parallax plugin --> 
        <script type="text/javascript"  src="assets/js/jquery.parallax-1.1.js"></script> 

        <!-- optionally include helper plugins --> 
        <script type="text/javascript"  src="assets/js/helper-plugins/jquery.mousewheel.min.js"></script> 

        <!-- include mCustomScrollbar plugin //Custom Scrollbar  --> 

        <script type="text/javascript" src="assets/js/jquery.mCustomScrollbar.js"></script> 

        <!-- include checkRadio plugin //Custom check & Radio  --> 
        <script type="text/javascript" src="assets/js/ion-checkRadio/ion.checkRadio.min.js"></script> 

        <!-- include grid.js // for equal Div height  --> 
        <script src="assets/js/grids.js"></script> 

        <!-- include carousel slider plugin  --> 
        <script src="assets/js/owl.carousel.min.js"></script> 

        <!-- jQuery minimalect // custom select   --> 
        <script src="assets/js/jquery.minimalect.min.js"></script> 

        <!-- include touchspin.js // touch friendly input spinner component   --> 
        <script src="assets/js/bootstrap.touchspin.js"></script> 

        <!-- include custom script for site  --> 
        <script src="assets/js/script.js"></script>
        <script src="js/productos.js"></script>
    </body>
</html>
