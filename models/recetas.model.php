<?php
require_once ("../config/config.php");

Class Recetas{
    public function todos(){
        $con = new ClaseConectar();
        $con = $con ->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `recetas`";
        $datos = mysqli_query($con,$cadena);
        $con->close();
        return $datos;
    }

    public function uno($receta_id){
        $con = new ClaseConectar();
        $con = $con ->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `recetas` WHERE `receta_id` = $receta_id";
        $datos = mysqli_query($con,$cadena);
        $con->close();
        return $datos;
    }

    public function insertar($nombre, $descripcion, $tiempo_preparacion, $dificultad){
        try{
            $con = new ClaseConectar();
            $con = $con ->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `recetas` (`nombre`, `descripcion`, `tiempo_preparacion`, `dificultad`) VALUES('$nombre','$descripcion','$tiempo_preparacion','$dificultad') ";
            if(mysqli_query($con, $cadena)){
                return $con -> insert_id;
            }else{
                return $con -> error;
            }
        }catch(Exception $e){
            return $e -> getMessage();
        }finally{
            $con -> close();
        }

    }

    public function actualizar($receta_id, $nombre, $descripcion, $tiempo_preparacion, $dificultad){
        try{
            $con = new ClaseConectar();
            $con = $con ->ProcedimientoParaConectar();
            $cadena = "UPDATE `recetas` SET `nombre` = '$nombre',`descripcion`='$descripcion', `tiempo_preparacion`='$tiempo_preparacion', `dificultad`='$dificultad' WHERE `receta_id` = $receta_id";
            if(mysqli_query($con, $cadena)){
                return $receta_id;
            }else{
                return $con -> error;
            }
        }catch(Exception $e){
            return $e -> getMessage();
        }finally{
            $con -> close();
        }
    }

    public function eliminar($idReceta){
        try{
            $con = new ClaseConectar();
            $con = $con ->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `recetas` WHERE `receta_id` = $idReceta";
            if(mysqli_query($con, $cadena)){
                return $idReceta;
            }else{
                return $con -> error;
            }
        }catch (Exception $e){
            return $e -> getMessage();
        }finally{
            $con -> close();
        }
    }
}