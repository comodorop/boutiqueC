<link href="../../alertify/themes/alertify.core.css" rel="stylesheet" media="screen">
<link href="../../alertify/themes/alertify.default.css" rel="stylesheet" media="screen">

<div class="modal signUpContent fade"id="ModalLogin" tabindex="-1" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                <h3 class="modal-title-site text-center" > Acceso al sistema </h3>
            </div>
            <div class="modal-body">
                <div class="form-group login-username">
                    <div >
                        <input name="loginuser" id="loginuser" class="form-control input"  size="20" placeholder="Usuario" type="text">
                    </div>
                </div>
                <div class="form-group login-password">
                    <div >
                        <input name="Password" id="loginpass" class="form-control input"  size="20" placeholder="Contraseña" type="password">
                    </div>
                </div>
                <div >
                    <div >
                        <input name="submit"  id="loginbtn"
                               class="btn  btn-block btn-lg btn-primary" 
                               value="INICIAR" type="submit">
                    </div>
                </div>
                <!--userForm--> 
            </div>
        </div>
        <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog --> 

</div>
<div class="navbar navbar-tshop navbar-fixed-top  " role="navigation">
    <div class="navbar-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6">
                    <div class="pull-left ">
                        <ul class="userMenu ">
                            <li> <a href="#"> <span class="hidden-xs">SUGERENCIAS</span><i class="glyphicon glyphicon-info-sign hide visible-xs "></i> </a> </li>
                            <li class="phone-number"> <a  href="callto:+8801680531352"> <span> <i class="glyphicon glyphicon-phone-alt "></i></span> <span class="hidden-xs" style="margin-left:5px"> 88 01680 53 1352 </span> </a> </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 no-margin no-padding">
                    <div class="pull-right">
                        <ul class="userMenu">
                            <li> <a href="#"  data-toggle="modal" data-target="#ModalLogin"> <span class="hidden-xs">Inciar Sesión</span> <i class="glyphicon glyphicon-log-in hide visible-xs "></i> </a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only"> Toggle navigation </span> <span class="icon-bar"> </span> <span class="icon-bar"> </span> <span class="icon-bar"> </span> </button>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-cart"> <i class="fa fa-shopping-cart colorWhite"> </i> <span class="cartRespons colorWhite"> Cart ($210.00) </span> </button>
            <a class="navbar-brand " href="index.html"> <img src="images/logo.png" alt="TSHOP"> </a> 
            <div class="search-box pull-right hidden-lg hidden-md hidden-sm">
                <div class="input-group">
                    <button class="btn btn-nobg getFullSearch" type="button"> <i class="fa fa-search"> </i> </button>
                </div>
            </div>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"> <a href="index.php"> Home </a> </li>
                <li > <a href="category.php"> Galeria </a> </li>
                <li > <a href="#"> Contactanos </a> </li>
            </ul>
            <div class="nav navbar-nav navbar-right hidden-xs">
                <div class="search-box">
                    <div class="input-group">
                        <button class="btn btn-nobg getFullSearch" type="button"> 
                            <i class="fa fa-search"> </i> 
                        </button>
                    </div>
                </div>
            </div>
        </div>
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
<script src="../../bootstrap/js/jquery.js"></script>
<script src="js/iniciarSession.js"></script>
<script src="../../alertify/lib/alertify.min.js"></script>