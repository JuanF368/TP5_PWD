<?php
$titulo="listarUsuarios";
include "../estructura/header.php";
include_once '../util/funciones.php';

$objUsuario= new AbmUsuario();
$listadoUsuarios= $objUsuario->buscar(null);
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <div class="container p-4 my-4 d-flex justify-content-center">
        <div class="div-form">
                <p class="display-6" id="tituloEjercicio">Listado de usuarios:</p>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Mail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listadoUsuarios as $usuario){ ?>
                            <tr>
                                <td><?php echo $usuario->getUsNombre(); ?></td>
                                <td><?php echo $usuario->getUsMail(); ?></td>
                                <td><a class="btn m-2 text-white" href="accion/actualizarLogin.php?idusuario=<?php echo $usuario->getIdUsuario(); ?>" id="botonMenu">actualizar datos</a></td>
                                <td><a class="btn m-2 bg-danger text-white" href="accion/eliminarLogin.php?idusuario=<?php echo $usuario->getIdUsuario(); ?>" id="botonMenu">eliminar datos</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <a class="btn mt-3 text-white" href="index.php" id="botonMenu">Volver atrás</a>
                <a class="btn mt-3 text-white bg-dark" href="index.php">Volver al menú principal</a>
        </div>
    </div>
</body>
