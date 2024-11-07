<?php
include_once "../../util/funciones.php";
print_r($_POST)."1<br>";
$root=$_POST['ROOT'];
$sesion=new Session();
$titulo = "Registrado";
include '../../estructura/header.php';

print_r($_POST)."2<br>";
$datos=data_submitted();
$userName=$datos['nombre'];
$userPass=md5($datos['contrasenia']);
$userMail=$datos['mail'];

print_r($_POST)."3<br>";
echo $_POST['ROOT'];