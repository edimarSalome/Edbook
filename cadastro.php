<?php

require 'classes/view/UsuarioView.php';
$usuario = new UsuarioView();

    if(isset($_POST['senha']) && ($_POST['senha'] === $_POST['confirmacao'])){
        $usuario->cadastrarUsuario($_POST);
        header('location:index.php');
        
    }else if(isset($_POST['senha']) && ($_POST['senha'] !== $_POST['confirmacao'])){
        
        echo 'Senha é diferente da confirmação';
        
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
                <div class="col-sm-12 col-md-8 col-md-offset-2">
                    <div class="panel" style="margin-top: 100px;">
                        <div class="panel-body">
                            <h4>EdBook - Login</h4>
                            <form method="post">
                                <div class="row">
                                    <div class="col-sm-12 form-group">
                                        <label>Nome completo</label>
                                        <input type="text" name="nome" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 form-group">
                                        <label>Usuário</label>
                                        <input type="text" name="usuario" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 form-group">
                                        <label>Senha</label>
                                        <input type="password" name="senha" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 form-group">
                                        <label>Confirmação de senha</label>
                                        <input type="password" name="confirmacao" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="col-sm-12 col-md-2 pull-right">
                                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                                        </div>
                                        <div class="col-sm-12 col-md-2 pull-right">
                                            <a href="login.html" class="btn btn-default">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="panel-footer" style="text-align: center;">
                            <a href="login.html">Faça login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
