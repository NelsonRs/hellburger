<?php
    try {
        $mysqli = new mysqli("localhost", "root", "", "dbburger");
        $mysqli->set_charset("utf8");
        date_default_timezone_set("America/La_Paz");
    }catch (\Throwable $th) {
        die("No se encontró la base de datos");
    }
    //  try {
    //     $mysqli = new mysqli("localhost", "mhsetzku_dblemans", "Nelson123..", "mhsetzku_dblemans");
    //     $mysqli->set_charset("utf8");
    //     date_default_timezone_set("America/La_Paz");
    // } catch (\Throwable $th) {
    //     die("No se encontró la base de datos");
    // }
?>