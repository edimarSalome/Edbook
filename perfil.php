<?php 
    require __DIR__.'/classes/view/UsuarioView.php';
    require __DIR__.'/classes/view/ComentarioView.php';
    
    $usuario = new UsuarioView();
    $comentario = new ComentarioView();
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>EdBook - Principal</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="lib/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="lib/css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container" style="padding-top:25px;">
            <div class="row">
                <div class="col-sm-12 col-md-8 col-md-offset-2">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel">
                                <?php $usuario->getPerfilUsuario(1); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?php $comentario->getComentarioByUsuario(1); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
