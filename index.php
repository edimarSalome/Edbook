<?php

require_once 'classes/view/UsuarioView.php';
    
    if(isset($_POST['login']) && isset($_POST['senha'])){
        $usuario = new UsuarioView();
        
        if($usuario->autenticar($_POST['login'], $_POST['senha'])){ 
            $usuario = $usuario->getUsuario($_POST['login']);
            session_start();
            $_SESSION['idUsuario'] = $usuario->id;
            header('location:principal.php');
        }
    }
    
    if(isset($_GET['logout']) && $_GET['logout'] == 'true'){
        session_start();
        session_destroy();
    }
    
    if(isset($_GET['login']) && $_GET['login'] == 'false'){
        $erro = "Necessário fazer login";
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Edbook - Sua rede Social</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="lib/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    </head>
    <body style="background:#bbb;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-md-offset-4">
                    <?php if(isset($erro)){ echo '<div class="alert alert-danger">'.$erro.'</div>';} ?>
                    <div class="panel" style="margin-top: 100px;">
                        <div class="panel-body">
                            <h4>EdBook - Login</h4>
                            <form method="post">
                                <div class="row">
                                    <div class="col-sm-12 form-group">
                                        <label>Login</label>
                                        <input type="text" name="login" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 form-group">
                                        <label>Senha</label>
                                        <input type="password" name="senha" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary pull-right">Entrar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="panel-footer" style="text-align: center;">
                            <a href="cadastro.php">Cadastre-se</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
