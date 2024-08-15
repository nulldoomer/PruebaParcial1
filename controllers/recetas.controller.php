<?php
require_once("../models/recetas.model.php");
require_once("../config/cors.php");

error_reporting(0);

$recetas = new Recetas();

switch($_GET["op"]){
    case "todos":
        $datos = array();
        $datos = $recetas->todos();
        $todos = array();
        while($fila = mysqli_fetch_assoc($datos)){
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;
    case "uno":
        $receta_id = $_POST["receta_id"];
        $datos = $recetas->uno($receta_id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
    case "insertar":
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $tiempo_preparacion = $_POST["tiempo_preparacion"];
        $dificultad = $_POST["dificultad"];
        $datos = array();
        $datos = $recetas->insertar($nombre, $descripcion, $tiempo_preparacion, $dificultad);
        echo json_encode($datos);
        break;
    case "actualizar":
        $receta_id = $_POST["receta_id"];
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $tiempo_preparacion = $_POST["tiempo_preparacion"];
        $dificultad = $_POST["dificultad"];
        $datos = array();
        $datos = $recetas->actualizar($receta_id,$nombre, $descripcion, $tiempo_preparacion, $dificultad);
        echo json_encode($datos);
        break;
    case "eliminar":
        $receta_id = $_POST["receta_id"];
        $datos = array();
        $datos = $recetas->eliminar($receta_id);
        echo json_encode($datos);
        break;
}
