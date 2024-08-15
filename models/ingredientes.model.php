<?php
require_once ("../config/config.php");

Class Ingredientes {
    public function todos() {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `ingredientes`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($ingrediente_id) {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `ingredientes` WHERE `ingrediente_id` = $ingrediente_id";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($nombre, $cantidad, $unidad, $calorias) {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `ingredientes` (`nombre`, `cantidad`, `unidad`, `calorias`) VALUES('$nombre', '$cantidad','$unidad', '$calorias')";
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

    public function actualizar($ingrediente_id, $nombre, $cantidad, $unidad, $calorias) {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `ingredientes` SET `nombre` = '$nombre', `cantidad` = '$cantidad', `unidad` = '$unidad', `calorias` = '$calorias' WHERE `ingrediente_id` = $ingrediente_id;
";
            if(mysqli_query($con, $cadena)) {
                return $ingrediente_id;
            } else {
                return $con->error;
            }
        } catch(Exception $e) {
            return $e->getMessage();
        } finally {
            $con->close();
        }
    }

    public function eliminar($ingrediente_id) {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `ingredientes` WHERE `ingrediente_id` = $ingrediente_id";
            if(mysqli_query($con, $cadena)) {
                return $ingrediente_id;
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

