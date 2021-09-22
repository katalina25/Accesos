<?php

include_once 'DB/Usuario.php';
include_once 'DB/UsuarioDB.php';

session_start();
$rut = null;
$contrasena = null;

if (isset($_POST['txtUser']) && isset($_POST['txtPassword'])) {
    $rut = $_POST['txtUser'];
    $contrasena = $_POST['txtPassword'];

    if ($rut && $contrasena != null) {
        $usuario = new Usuario();
        $UsuarioDB = new UsuarioDB();
        $usuario = $UsuarioDB->login($rut, $contrasena);

        if ($usuario != null) {
            $_SESSION['usu'] = $usuario;
            header("Location: index.php");
            echo $rut. $contrasena;
        } else {
            $_SESSION['error'] = 'error';
            header("Location: login.php");
        }
    } else {
        header("Location: login.php");
    }
}
