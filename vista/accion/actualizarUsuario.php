<?php
$titulo="actualizarUsuarios";
include "../../estructura/header.php";
include_once '../../util/funciones.php';

$datos=data_submitted();
$obj=new AbmUsuario();

$userId=$datos['id'];
$userName=$datos['nombre'];
$userPass=$datos['pass'];
$userMail=$datos['mail'];
$userDes=$datos['deshabilitado'];

$param['idusuario']=$userId;
$param['usnombre']=$userName;
$param['uspass']=$userPass;
$param['usmail']=$userMail;
$param['usdeshabilitado']=$userDes;

$obj->modificacion($param);

$paramid['idusuario']=$datos['id'];
$usuarioModificado = $obj->buscar($paramid)
?>

<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <div class="container p-4 my-4 d-flex justify-content-center">
        <div class="div-form">
                <p class="display-6" id="tituloEjercicio">Datos actualizados</p>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Mail</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td><?php echo $usuarioModificado[0]->getUsNombre(); ?></td>
                                <td><?php echo $usuarioModificado[0]->getUsMail(); ?></td>
                            </tr>
                    </tbody>
                </table>

                <a class="btn mt-3 text-white" href="../listarUsuario.php" id="botonMenu">Volver atrás</a>
            <a class="btn mt-3 text-white bg-dark" href="../../../index.php">Volver al menú principal</a>
        </div>
    </div>