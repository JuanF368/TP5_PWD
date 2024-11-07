<?php
include_once '../../util/funciones.php';
$sesion=new Session();

$datos=data_submitted();
$userName=$datos['nombre'];
$userPass=md5($datos['contrasenia']);

$sesion->iniciar($userName, $userPass);
if($sesion->validar()){
    header("Location: ../paginaSegura.php");
}else{
    header("Location: ../login.php");
}