<?php

class coneccion {

//    function Conectarse() {
//        if (!($link = mysql_connect("localhost", "root", ""))) {
//            echo "Error conectando a la base de datos.";
//            exit();
//        }
//        if (!mysql_select_db("boutique", $link)) {
//            echo "Error seleccionando la base de datos.";
//            exit();
//        }
//        return $link;
//    }
//
//    function cerrarBd() {
//        mysql_close();
//    }

    function Conectarse() {
        if (!($link = mysql_connect("localhost", "koolash", "Oriente65"))) {
            echo "Error conectando a la base de datos.";
            exit();
        }
        if (!mysql_select_db("boutique", $link)) {
            echo "Error seleccionando la base de datos.";
            exit();
        }
        return $link;
    }

    function cerrarBd() {
        mysql_close();
    }

}
