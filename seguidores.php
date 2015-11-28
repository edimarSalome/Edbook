<?php

require 'classes/view/UsuarioView.php';

    session_start();    
    if(!$_SESSION['idUsuario']){
        unset($_SESSION);
        header('location:index.php?login=false');
    }

$usuario = new UsuarioView();
$idUsuario = isset($_GET['userId']) ? $_GET['userId'] : 0;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>EdBook - Seguidores</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="lib/css/bootstrap.css" rel="stylesheet" >
        <link href="lib/css/style.css" rel="stylesheet" >
    </head>
    <body>
        <?php $usuario->getMenu(); ?>
        <div class="container" style="margin-top: 50px; padding-top: 25px;">
            <div class="row">
                <?php $usuario->getSeguidores($idUsuario); ?>
            </div>
        </div>
    </body>
</html>
