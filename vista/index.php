<?php
$titulo = "TP4 - Menú";
include '../estructura/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <div class="container p-4 my-4 d-flex justify-content-center">
        <div>
            <p class="h1" style="color:#295F98">Trabajo práctico 5</p>

            <div id="divBoton1" class="mt-4">
                <div class="card">
                    <a class="btn" href="login.php">
                        <div class="card-header">
                            <span class="h5">Login</span>
                        </div>
                    </a>
                </div>
            </div>

            <div id="divBoton2" class="mt-4">
                <div class="card">
                    <a class="btn" href="listarUsuario.php">
                        <div class="card-header">
                            <span class="h5">Ver listado de usuarios</span>
                        </div>
                    </a>
                </div>
            </div>

            <div id="divBoton3" class="mt-4">
                <div class="card">
                    <a class="btn" href="register.php">
                        <div class="card-header">
                            <span class="h5">Registrarse</span>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>

    <?php
    include '../estructura/footer.php';
    ?>

</body>

</html>