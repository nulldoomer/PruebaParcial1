<?php
require_once("../models/receta_ingrediente.model.php");
require_once("../config/cors.php");

error_reporting(0);

$recetaIngrediente = new Receta_Ingrediente();

switch($_GET["op"]){
    case "todos":
        $datos = array();
        $datos = $recetaIngrediente->todos();
        $todos = array();
        while($fila = mysqli_fetch_assoc($datos)){
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;
    case "uno_receta":
        $receta_id = $_POST["receta_id"];
        $datos = $recetaIngrediente->uno_receta($receta_id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
    case "uno_ingrediente":
        $ingrediente_id = $_POST["ingrediente_id"];
        $datos = $recetaIngrediente->uno_ingrediente($ingrediente_id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
    case "insertar":
        $receta_id = $_POST["receta_id"];
        $ingrediente_id = $_POST["ingrediente_id"];
        $cantidad = $_POST["cantidad"];
        $unidad = $_POST["unidad"];
        $datos = array();
        $datos = $recetaIngrediente->insertar($receta_id, $ingrediente_id, $cantidad, $unidad);
        echo json_encode($datos);
        break;
    case "actualizar":
        $receta_id = $_POST["receta_id"];
        $ingrediente_id = $_POST["ingrediente_id"];
        $cantidad = $_POST["cantidad"];
        $unidad = $_POST["unidad"];
        $datos = array();
        $datos = $recetaIngrediente->actualizar($receta_id, $ingrediente_id, $cantidad, $unidad);
        echo json_encode($datos);
        break;
    case "eliminar":
        $receta_id = $_POST["receta_id"];
        $ingrediente_id = $_POST["ingrediente_id"];
        $datos = array();
        $datos = $recetaIngrediente->eliminar($receta_id, $ingrediente_id);
        echo json_encode($datos);
        break;
}