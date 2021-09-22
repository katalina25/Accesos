<?php

include_once 'Conexion.php';
include_once 'Usuario.php';

class UsuarioDB extends Conexion
{

    function login($rut, $password)
    {

        $devolver = null;
        $this->conectar();

        $sql = "SELECT * from usuario where rut = ? AND password = ?";
        $stmt = $this->miConexion->prepare($sql) or trigger_error($this->miConexion->error . "[$sql]");
        $stmt->bind_param("ss", $rut, $password);
        $stmt->execute();
        $resultados = $stmt->get_result();
        while ($fila = $resultados->fetch_assoc()) {
            $usuario = new Usuario();
            $usuario->rut = $fila['rut'];
            $devolver = $usuario;
        }

        $this->desconectar();

        return $devolver;
    }
}
