<?php
$titulo="listarUsuarios";
include "../../estructura/header.php";
include_once '../../util/funciones.php';

$datos=data_submitted();
echo "datos:<br>";
print_r($datos);
$objUR=new AbmUsuariorol();
$obj=new AbmUsuario();
$param['idusuario']=$datos['idusuario'];
echo "param:<br>";
print_r($param);
$userol=$objUR->buscar($param);
print_r($userol);
$rol=$userol[0]->getIdRol();
$param['idrol']=$rol;
print_r($param);
$baja=false;
if($objUR->baja($param)){
    if($obj->baja($param)){
        $baja=true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <div class="container p-4 my-4 d-flex justify-content-center">
        <div class="div-form">
            <div>
                <p class="h1" style="color:#FF5050">Eliminado correctamente</p>
            </div>
            <a class="btn mt-3 text-white" href="../listarUsuario.php" id="botonMenu">Volver atrás</a>
            <a class="btn mt-3 text-white bg-dark" href="../index.php">Volver al menú principal</a>
        </div>
    </div>
    
    <?php
    include '../../estructura/footer.php';
    ?>
</body>
