<?php
$titulo="actualizarUsuarios";
include "../../estructura/header.php";
include_once '../../util/funciones.php';

$datos=data_submitted();
$obj=new AbmUsuario();
$param['idusuario']=$datos['idusuario'];
$user=$obj->buscar($param);
$userId=$user[0]->getIdUsuario();
$userName=$user[0]->getUsNombre();
$userPass=$user[0]->getUsPass();
$userMail=$user[0]->getUsMail();
$userDes=$user[0]->getUsDeshabilitado();
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <div class="container p-4 my-4 d-flex justify-content-center">
        <div class="div-form">
            <p class="display-6" id="tituloEjercicio">En caso de desearlo puede cambiar los datos</p>
            <form action="actualizarUsuario.php" method="post" name="formActualizarUsuario" id="formActualizarUsuario">
                    <input type="hidden" name="id" id="id" value="<?php echo $userId; ?>">
                    
                    <label class="form-label" for="nombre">Nombre:</label>
                    <input class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $userName; ?>">

                    <input type="hidden" name="pass" id="pass" value="<?php echo $userPass; ?>">

                    <label class="form-label" for="mail">Mail:</label>
                    <input class="form-control" type="text" name="mail" id="mail" value="<?php echo $userMail; ?>">
            
                    <input type="hidden" name="deshabilitado" id="deshabilitado" value="<?php echo $userDes; ?>">

                    <input type="submit" class="btn mt-3 bg-success text-white" value="Actualizar datos">
            </form>
            <a class="btn mt-3 text-white" href="../listarUsuario.php" id="botonMenu">Volver atrás</a>
            <a class="btn mt-3 text-white bg-dark" href="../../../index.php">Volver al menú principal</a>
        </div>
    </div>
</body>