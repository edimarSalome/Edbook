<?php 
    require __DIR__.'/classes/view/UsuarioView.php';
    
    $view = new UsuarioView();
    $usuario = $view->getUsuario();
    $view->setUsuario();
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
                                <?php $view->getPerfilUsuario(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-2">
                                            <img src="img/perfil.jpg" alt="Usuario" class="foto-comentario"/>
                                        </div>
                                        <div class="col-sm-12 col-md-10">
                                            <span class="nome-comentario">@OJusticeiro</span>
                                            <span class="data-comentario">26 set 2015</span>
                                            <p>" Este projeto é muito legal! hahahahahahaahhaas "</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-sm-12 text-right">
                                            <span><a href="#"><i class="glyphicon glyphicon-star"></i> 30</a></span>
                                            <span><a href="#"><i class="glyphicon glyphicon-share-alt"></i> 200</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
