<?php

    require_once 'classes/view/UsuarioView.php';
    require_once 'classes/view/ComentarioView.php';
    session_start();
    $usuario = new UsuarioView();
    $idUsuario = isset($_GET['userId']) ? $_GET['userId'] : null ; //será obtido via sessão
    $comentario = new ComentarioView();
    
    print_r($_SESSION['idUsuario']);
    
    if(isset($_POST['comentario'])){
        $comentario->comentar($idUsuario, $_POST['comentario']);
    }
    if(isset($_POST['addStar']) && isset($_POST['idComentario'])){
        $comentario->addStar($_POST['idComentario']);
    }
    if(isset($_POST['replicar']) && isset($_POST['idComentario'])){
        $comentario->replicar($_POST['idComentario'], $idUsuario);
    }

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
                <div class="col-sm-12 col-md-3">
                    <?php $usuario->getPerfilUsuarioLogado($idUsuario); ?>
                </div>
                <div class="col-sm-12 col-md-9">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <form method="post">
                                        <div class="col-sm-12 form-group">
                                            <textarea placeholder="Vai dizer o que?" class="form-control" name="comentario"></textarea>
                                        </div>
                                        <div class="col-sm-12 form-group">
                                            <button type="submit" class="btn btn-primary pull-right">Publicar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?php $comentario->getFeedByUsuario($idUsuario); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
