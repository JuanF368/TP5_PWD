<?php
include_once '../../util/funciones.php';
$sesion=new Session();
$titulo = "Registrado";
include '../../estructura/header.php';

$datos=data_submitted();
$userName=$datos['nombre'];
$userPass=md5($datos['contrasenia']);
$userMail=$datos['mail'];

$obj=new AbmUsuario();
$objUR=new AbmUsuariorol();

$param=[
    'idusuario' => null,
    'usnombre' => $userName,
    'uspass' => $userPass,
    'usmail' => $userMail,
    'usdeshabilitado' => '00-00-00 00:00:00'
];
$obj->alta($param);

$sesion->iniciar($userName, $userPass);
$id=$sesion->getUsuario();
$paramUR=[
    'idusuario' => $_SESSION['idusuario'],
    'idrol' => 3
];
$objUR->alta($paramUR);

echo "<a href='../index.php'>menu</a>";
?>