<?php
$titulo="Registrarse";
include "../estructura/header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<div class="container p-4 my-4 d-flex justify-content-center">
        <div class="div-form">
            <p class="display-6" id="tituloEjercicio">Registrarse</p>
            <form action="accion/registrarUsuario.php" method="post" name="formRegistrarse" id="formRegistrarse">
                
                <label class="form-label" for="nombre">Nombre:</label>
                <input class="form-control" type="text" name="nombre" id="nombre">
                
                <label class="form-label" for="contrasenia">Contraseña:</label>
                <input class="form-control" type="text" name="contrasenia" id="contrasenia">
                
                <label class="form-label" for="mail">Mail:</label>
                <input class="form-control" type="text" name="mail" id="mail">
                
                <div class="d-flex justify-content-center">
                    <input type="submit" class="btn m-3 bg-success text-white" value="Registrarse">
                    <a class="btn m-3 text-white" href="index.php" id="botonMenu">Volver atrás</a>
                    <a class="btn m-3 text-white bg-dark" href="index.php" id="botonMenu">Volver al
                        menú principal</a>
                </div>
            </form>
        </div>
    </div>

    <?php
   include '../estructura/footer.php';
    ?>
</body>
</html>