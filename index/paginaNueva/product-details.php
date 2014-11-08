<?php
include '../../daoconexion/daoConeccion.php';
$cn = new coneccion();
$codigoProducto = $_GET["codigoProducto"];
$idGrupoProducto = 0;
$sqlDameProductos = "SELECT * FROM productos p "
        . "INNER JOIN clasificados cl "
        . "on p.codigoProducto = cl.codigoProducto "
        . "INNER JOIN tallas t on "
        . "p.idtalla = t.idTalla WHERE p.codigoProducto = '$codigoProducto'";
$sqlDameImagenes = "SELECT * FROM imagenes WHERE codigoProducto ='$codigoProducto'";
$sqlDameColores = "SELECT * FROM Colores WHERE codigoProducto = '$codigoProducto'";
$sqlDamePrecios = "SELECT * FROM tarifas WHERE codigoProducto = '$codigoProducto' and idListaPrecio='1'";
$sqlClasificados = "SELECT * FROM clasificados WHERE codigoProducto ='$codigoProducto'";
$cn->Conectarse();
$datosProductos = mysql_query($sqlDameProductos);
$datosImagenes = mysql_query($sqlDameImagenes);
$datosColores = mysql_query($sqlDameColores);
$datosPrecios = mysql_query($sqlDamePrecios);
$datosClasificados = mysql_query($sqlClasificados);

if ($datosColores == false || $datosImagenes == false || $datosPrecios == false || $datosProductos == false || $datosClasificados == false) {
    echo '<h1>' . mysql_error() . '</h1>';
}
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
        <title>TSHOP - Bootstrap E-Commerce Parallax Theme </title>
        <!-- Bootstrap core CSS -->
        <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">


        <!-- styles needed by smoothproducts.js for product zoom  -->
        <link rel="stylesheet" href="assets/css/smoothproducts.css">

        <!-- styles needed by carousel slider -->
        <link href="assets/css/owl.carousel.css" rel="stylesheet">
        <link href="assets/css/owl.theme.css" rel="stylesheet">

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
        <div class="navbar navbar-tshop navbar-fixed-top  " role="navigation">
            <!--/.navbar-top-->
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only"> Toggle navigation </span> <span class="icon-bar"> </span> <span class="icon-bar"> </span> <span class="icon-bar"> </span> </button>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-cart"> <i class="fa fa-shopping-cart colorWhite"> </i> <span class="cartRespons colorWhite"> Cart ($210.00) </span> </button>
                    <a class="navbar-brand " href="index.html"> <img src="images/logo.png" alt="TSHOP"> </a> 

                    <!-- this part for mobile -->
                    <div class="search-box pull-right hidden-lg hidden-md hidden-sm">
                        <div class="input-group">
                            <button class="btn btn-nobg getFullSearch" type="button"> <i class="fa fa-search"> </i> </button>
                        </div>
                        <!-- /input-group --> 

                    </div>
                </div>
                <!-- this part is duplicate from cartMenu  keep it for mobile -->

                <!--/.navbar-cart-->
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"> <a href="#"> Home </a> </li>
                        <li > <a href="#"> Galeria </a> </li>
                        <li > <a href="#"> Contactanos </a> </li>
                        <!-- change width of megamenu = use class > megamenu-fullwidth, megamenu-60width, megamenu-40width -->
                    </ul>
                    <!--- this part will be hidden for mobile version -->
                    <div class="nav navbar-nav navbar-right hidden-xs">
                        <div class="search-box">
                            <div class="input-group">
                                <button class="btn btn-nobg getFullSearch" type="button"> 
                                    <i class="fa fa-search"> </i> 
                                </button>
                            </div>
                            <!-- /input-group --> 
                        </div>
                        <!--/.search-box --> 
                    </div>
                    <!--/.navbar-nav hidden-xs--> 
                </div>
                <!--/.nav-collapse --> 
            </div>
            <!--/.container -->
            <div class="search-full text-right"> 
                <a class="pull-right search-close"> 
                    <i class=" fa fa-times-circle"> </i> 
                </a>
                <div class="searchInputBox pull-right">
                    <input type="search"  data-searchurl="search?=" name="q" placeholder="start typing and hit enter to search" class="search-input">
                    <button class="btn-nobg search-btn" type="submit"> <i class="fa fa-search"> </i> </button>
                </div>
            </div>
            <!--/.search-full--> 
        </div>
        <!-- /.Fixed navbar  --><div class="container main-container headerOffset">
            <div class="row">
                <div class="breadcrumbDiv col-lg-12">
                    <ul class="breadcrumb">
                        <li> <a href="index.html">Home</a> </li>
                        <li> <a href="category.html">MEN COLLECTION</a> </li>
                        <li> <a href="sub-category.html">TSHIRT</a> </li>
                        <li class="active">Lorem ipsum dolor sit amet </li>
                    </ul>
                </div>
            </div>
            <div class="row transitionfx">
                <!-- left column -->
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <!-- product Image and Zoom -->
                    <div class="main-image sp-wrap col-lg-12 no-padding"> 
                        <?php
                        if ($datosImagenes == true) {
                            while ($rsImagenes = mysql_fetch_array($datosImagenes)) {
                                ?>
                                <a href="#">
                                    <img src="../../subidas/<?php echo $rsImagenes["ruta"]; ?>" class="img-responsive" >
                                </a> 
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div><!--/ left column end -->


                <!-- right column -->
                <div class="col-lg-6 col-md-6 col-sm-5">
                    <br/><br/><br/>
                    <?php
                    while ($dat = mysql_fetch_array($datosProductos)) {
                        $idGrupoProducto = $dat["idGrupoProducto"];
                        ?>
                        <h1 class="product-title"> <?php echo $dat["producto"]; ?></h1>
                        <h3 class="product-code">CODIGO :<?php echo $dat["codigoProducto"]; ?></h3>
                    <?php } ?>
                    <div class="product-price"> 
                        <span class="price-sales"> 
                            <?php
                            while ($rsTarifas = mysql_fetch_array($datosPrecios)) {
                                echo "$" . $rsTarifas["tarifa"] . "&nbsp;mxn";
                            }
                            ?>
                        </span> 
                    <!--<span class="price-standard">$95</span>--> 
                    </div>
                    <div class="color-details"> 
                        <span class="selected-color"><strong>COLOR</strong></span>
                        <ul class="swatches Color">
                            <?php
                            while ($datosColo = mysql_fetch_array($datosColores)) {
                                ?>
                                <li> <a style="background-color:#<?php echo $datosColo["color"]; ?>" > </a> </li>
                                <?php
                            }
                            ?>
                        </ul>gru
                    </div>

                    <div class="clear"></div>

                    <div class="product-tab w100 clearfix">

                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#details" data-toggle="tab">Descripción</a></li>

                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="details">
                                <?php
                                while ($datosCaract = mysql_fetch_array($datosClasificados)) {
                                    echo $datosCaract["descripcion"];
                                }
                                ?>
                                <br>
                            </div>
                        </div> <!-- /.tab content -->
                    </div><!--/.product-tab-->

                    <div style="clear:both"></div>
                </div>
            </div>
            <div class="row recommended">

                <h1> Ver mas productos relacionados </h1>
                <?php
                $sqlDameProductosImagenes = "SELECT * FROM productos p "
                        . "INNER JOIN clasificados cl "
                        . "on p.codigoProducto = cl.codigoProducto "
                        . "INNER JOIN tallas t on "
                        . "p.idtalla = t.idTalla "
                        . "WHERE p.idGrupoProducto='$idGrupoProducto'";
                $datosProductosImagenes = mysql_query($sqlDameProductosImagenes, $cn->Conectarse());
                if ($datosProductosImagenes == false) {
                    echo '<h1>' . mysql_error() . '<h1>';
                }
                ?>
                <div id="SimilarProductSlider">
                    <?php
                    while ($rsImagenes = mysql_fetch_array($datosProductosImagenes)) {
                        ?>
                        <div class="item">
                            <div class="product"> 
                                <a class="product-image" href="product-details.php?codigoProducto=<?php echo $rsImagenes["codigoProducto"]; ?>"> 
                                    <!--<img src="../../subidas/"  alt="img">--> 
                                    <img src="../../subidas/<?php echo $rsImagenes["idProducto"]; ?>-_-0.jpg" alt="img" >
                                </a>
                                <div class="description">
                                    <h4><a href="san-remo-spaghetti">YOUR LIFE</a></h4>
                                    <div class="price"> <span>$57</span> </div>
                                </div>
                            </div>
                        </div><!--/.item-->
                    <?php } ?> 
                </div>  <!--/.recommended--> 
            </div>
            <div style="clear:both"></div>
        </div> <!-- /main-container -->


        <div class="gap"></div>


        <footer>
            <div class="footer">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3  col-md-3 col-sm-4 col-xs-6">
                            <h3>
                                Support 
                            </h3>
                            <ul>
                                <li class="supportLi">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur 
                                    </p>
                                    <h4>

                                        <a class="inline" href="callto:+8801680531352">
                                            <strong>
                                                <i class="fa fa-phone">
                                                </i>
                                                88 01680 531352
                                            </strong>
                                        </a>
                                    </h4>
                                    <h4>
                                        <a class="inline" href="mailto:help@tshopweb.com">
                                            <i class="fa fa-envelope-o">
                                            </i>
                                            help@tshopweb.com
                                        </a>
                                    </h4>
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
                            <h3>
                                Information
                            </h3>
                            <ul>
                                <li> <a href="product-details.html"> Product Details </a> </li>
                                <li> <a href="product-details-style2.html"> Product Details Version 2 </a> </li>
                                <li> <a href="cart.html"> Cart </a> </li>
                                <li> <a href="about-us.html"> About us </a> </li>
                                <li> <a href="about-us-2.html">
                                        About us 2 
                                    </a>

                                </li>
                                <li> <a href="contact-us.html">
                                        Contact us
                                    </a>

                                </li>
                                <li> <a href="contact-us-2.html">
                                        Contact us 2 
                                    </a>

                                </li>
                                <li> <a href="terms-conditions.html">
                                        Terms &amp; Conditions
                                    </a>

                                </li>

                            </ul>
                        </div>

                        <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                            <h3>
                                My Account
                            </h3>
                            <ul>
                                <li> <a href="account-1.html">
                                        Account Login
                                    </a>

                                </li>
                                <li> <a href="account.html">
                                        My Account
                                    </a>

                                </li>
                                <li> <a href="my-address.html">
                                        My Address
                                    </a>

                                </li>
                                <li> <a href="wishlist.html">
                                        Wisth list
                                    </a>

                                </li>
                                <li> <a href="order-list.html">
                                        Order list
                                    </a>

                                </li>

                            </ul>
                        </div>

                        <div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 ">
                            <h3>
                                Stay in touch
                            </h3>
                            <ul>
                                <li>
                                    <div class="input-append newsLatterBox text-center">
                                        <input type="text" class="full text-center"  placeholder="Email ">
                                        <button class="btn  bg-gray" type="button">
                                            Subscribe 
                                            <i class="fa fa-long-arrow-right">

                                            </i>
                                        </button>
                                    </div>
                                </li>
                            </ul>
                            <ul class="social">
                                <li> <a href="http://facebook.com">
                                        <i class=" fa fa-facebook">
                                            &nbsp;
                                        </i>
                                    </a>
                                </li>
                                <li> <a href="http://twitter.com">
                                        <i class="fa fa-twitter">
                                            &nbsp;
                                        </i>
                                    </a>
                                </li>
                                <li> <a href="https://plus.google.com">
                                        <i class="fa fa-google-plus">
                                            &nbsp;
                                        </i>
                                    </a>
                                </li>
                                <li> <a href="http://youtube.com">
                                        <i class="fa fa-pinterest">
                                            &nbsp;
                                        </i>
                                    </a>
                                </li>
                                <li> <a href="http://youtube.com">
                                        <i class="fa fa-youtube">
                                            &nbsp;
                                        </i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div><!--/.row-->
                </div><!--/.container-->
            </div><!--/.footer-->

            <div class="footer-bottom">

                <div class="container">
                    <p class="pull-left">
                        &copy; TSHOP 2014. All right reserved.
                    </p>
                    <div class="pull-right paymentMethodImg">

                        <img height="30" class="pull-right" src="images/site/payment/master_card.png" alt="img" >
                        <img height="30" class="pull-right" src="images/site/payment/paypal.png" alt="img" >
                        <img height="30" class="pull-right" src="images/site/payment/american_express_card.png" alt="img" >
                        <img  height="30" class="pull-right" src="images/site/payment/discover_network_card.png" alt="img" >
                        <img  height="30" class="pull-right" src="images/site/payment/google_wallet.png" alt="img" >
                    </div>


                </div>

            </div><!--/.footer-bottom-->
        </footer>


        <!-- Le javascript
        ================================================== --> 

        <!-- Placed at the end of the document so the pages load faster --> 
        <script type="text/javascript" src="assets/js/jquery/1.8.3/jquery.js"></script> 
        <script src="assets/bootstrap/js/bootstrap.min.js"></script> 

        <!-- include jqueryCycle plugin --> 
        <script src="assets/js/jquery.cycle2.min.js"></script> 
        <!-- include easing plugin --> 
        <script src="assets/js/jquery.easing.1.3.js"></script> 

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

        <!-- include smoothproducts // product zoom plugin  --> 
        <script type="text/javascript" src="assets/js/smoothproducts.min.js"></script> 

        <!-- jQuery minimalect // custom select   --> 
        <script src="assets/js/jquery.minimalect.min.js"></script> 

        <!-- include touchspin.js // touch friendly input spinner component   --> 
        <script src="assets/js/bootstrap.touchspin.js"></script> 

        <!-- include custom script for site  --> 
        <script src="assets/js/script.js"></script>

    </body>
</html>
