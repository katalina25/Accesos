<?php

include_once 'Conexion.php';
include_once 'Atajo.php';

class AtajoDB extends Conexion
{

    

    function listar()
    {

        $arreglo = array();
        $this->conectar();

        $sql = "SELECT * from atajo order by nombre";
        $resultados = $this->miConexion->query($sql);
        while ($fila = $resultados->fetch_assoc()) {
            $atajo = new atajo();
            $atajo->nombre = $fila['nombre'];
            $atajo->descripcion = $fila['descripcion'];
            $atajo->rutaAtajo = $fila['rutaAtajo'];
            $atajo->rutaImagen = $fila['rutaImagen'];


            $arreglo[] = $atajo;
        }

        $this->desconectar();

        return $arreglo;
    }

}
