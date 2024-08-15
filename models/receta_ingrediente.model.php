<?php
require_once("../config/config.php");

Class Receta_Ingrediente{

    public function todos(){
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT r.nombre AS receta, i.nombre AS ingrediente, ri.cantidad, ri.unidad
                    FROM Receta_Ingrediente ri
                    INNER JOIN Recetas r ON ri.receta_id = r.receta_id
                    INNER JOIN Ingredientes i ON ri.ingrediente_id = i.ingrediente_id;";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno_receta($receta_id){
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT r.nombre AS receta, i.nombre AS ingrediente, ri.cantidad, ri.unidad
                    FROM Receta_Ingrediente ri
                    INNER JOIN Recetas r ON ri.receta_id = r.receta_id
                    INNER JOIN Ingredientes i ON ri.ingrediente_id = i.ingrediente_id WHERE ri.receta_id = $receta_id";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }
    public function uno_ingrediente($ingrediente_id){
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT r.nombre AS receta, i.nombre AS ingrediente, ri.cantidad, ri.unidad
                    FROM Receta_Ingrediente ri
                    INNER JOIN Recetas r ON ri.receta_id = r.receta_id
                    INNER JOIN Ingredientes i ON ri.ingrediente_id = i.ingrediente_id WHERE ri.ingrediente_id = $ingrediente_id";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($receta_id, $ingrediente_id, $cantidad, $unidad) {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `receta_ingrediente` (`receta_id`, `ingrediente_id`, `cantidad`, `unidad`) VALUES('$receta_id', '$ingrediente_id','$cantidad', '$unidad')";
            if(mysqli_query($con, $cadena)) {
                return $con->insert_id;
            } else {
                return $con->error;
            }
        } catch(Exception $e) {
            return $e->getMessage();
        } finally {
            $con->close();
        }
    }

    public function actualizar($receta_id, $ingrediente_id, $cantidad, $unidad) {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `receta_ingrediente` SET `cantidad` = '$cantidad', `unidad` = '$unidad' WHERE `receta_id` = $receta_id AND `ingrediente_id` = $ingrediente_id";
            if(mysqli_query($con, $cadena)) {
                return array('receta_id' => $receta_id, 'ingrediente_id' => $ingrediente_id);
            } else {
                return $con->error;
            }
        } catch(Exception $e) {
            return $e->getMessage();
        } finally {
            $con->close();
        }
    }

    public function eliminar($receta_id, $ingrediente_id) {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `receta_ingrediente` WHERE `receta_id` = $receta_id AND `ingrediente_id` = $ingrediente_id";
            if(mysqli_query($con, $cadena)) {
                return array('receta_id' => $receta_id, 'ingrediente_id' => $ingrediente_id);
            } else {
                return $con->error;
            }
        } catch(Exception $e) {
            return $e->getMessage();
        } finally {
            $con->close();
        }
    }
}