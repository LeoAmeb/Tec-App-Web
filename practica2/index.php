<?php
    require_once('bd/conexion.php');
    require 'vistas/header.php';
    require 'vistas/footer.php';
    require 'controlador/estudiante_controller.php';
    require 'controlador/universidad_controller.php';
    require 'controlador/carrera_controller.php';

    $universidad= new universidad_controller();
    $estudiante = new estudiante_controller();
    $carrera = new carrera_controller();

    if (!empty($_REQUEST["m"])) {
        $metodo=$_REQUEST['m'];
        if (method_exists($estudiante, $metodo)) {
            $estudiante->$metodo();
        }else{
            $estudiante->index();
        }
    } else if (!empty($_REQUEST["u"])) {
        $metodo=$_REQUEST['u'];
        if (method_exists($universidad, $metodo)) {
            $universidad->$metodo();
        }else{
            $universidad->index();
        }
    } else if (!empty($_REQUEST["c"])) {
        $metodo=$_REQUEST['c'];
        if (method_exists($carrera, $metodo)) {
            $carrera->$metodo();
        }else{
            $carrera->index();
        }
    }
?>