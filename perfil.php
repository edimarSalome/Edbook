<?php 
    require __DIR__.'/classes/view/UsuarioView.php';
    require __DIR__.'/classes/view/ComentarioView.php';
    
    $usuario = new UsuarioView();
    $comentario = new ComentarioView();
    
    $idUsuario = isset($_GET['userId']) ? $_GET['userId'] : null ;
    $usuarioLogado = 2;//Este id virá via session
    
    if(isset($_POST['seguir'])){
        $usuario->seguir($usuarioLogado, $idUsuario);
    }
    if(isset($_POST['naoseguir'])){
        $usuario->deixarDeSeguir($usuarioLogado, $idUsuario);
    }
    if(isset($_POST['addStar']) && isset($_POST['idComentario'])){
        $comentario->addStar($_POST['idComentario']);
    }
    
    $amizade = $usuario->verificaAmizade($usuarioLogado, $idUsuario);
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>EdBook - Perfil do usuario</title>
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
                                <?php $usuario->getPerfilUsuario($idUsuario, $amizade); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?php $comentario->getComentarioByUsuario($idUsuario); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
