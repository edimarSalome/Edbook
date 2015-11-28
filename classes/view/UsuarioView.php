<?php

/**
 * Descrição da classe UsuarioView
 * @author EDIMAR
 * @date 17/10/2015
 */
require __DIR__.'/../model/Usuario.php';
require __DIR__.'/../DAO/UsuarioDAO.php';

class UsuarioView {
    
    private $usuario;
    private $usuarioDao;
    
    function __construct() {
        $this->usuario = new Usuario();
        $this->usuarioDao = new UsuarioDAO();
    }
    
    public function getPerfilUsuario($idUsuario, $amizade){
        $usuario = $this->usuarioDao->getUsuarioById($idUsuario);
        
        if($amizade){
            $seguir = '<form method="post" style="float:left; margin-right:5px;">
                            <input type="hidden" name="naoseguir" value="true" />
                            <button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Deixar de Seguir</button>
                        </form>';
        }else{
            $seguir = '<form method="post" style="float:left; margin-right:5px;">
                            <input type="hidden" name="seguir" value="true" />
                            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-road"></i> Seguir</button>
                        </form>';
        }
        
        foreach ($usuario as $key => $value) {
            $html = '<div class="panel-body">
                        <div class="col-sm-4">
                            <img class="foto-perfil" src="'.PASTAIMG.$value->foto.'" />
                        </div>
                        <div class="col-sm-8">
                            <h3>@'.$value->usuario.'</h3>
                            <p>'.$value->nome.'</p>
                            <span>'.$value->email.'</span>
                            <div class="row">
                                <div class="col-sm-12" style="margin-top:30px;">
                                    '.$seguir.'
                                    <a class="btn btn-default" href="seguidores.php?userId='.$value->id.'"><i class="glyphicon glyphicon-user"></i> Ver Seguidores</a>
                                </div>
                            </div>
                        </div>
                    </div>';

            echo $html;
        }
    }
    
    public function getPerfilUsuarioLogado($idUsuario){
        $usuario = $this->usuarioDao->getUsuarioById($idUsuario);
        
        foreach ($usuario as $key => $value) {
            $html ='<img class="foto-perfil" src="'.PASTAIMG.$value->foto.'" alt="Foto perfil" title="Foto perfil"/>
                <ul class="list-group">
                    <li class="list-group-item"><a href="perfil.php?userId='.$value->id.'">@'.$value->usuario.'</a></li>
                    <li class="list-group-item"><a href="seguidores.php?userId='.$value->id.'">Seguidores</a></li>
                    <li class="list-group-item"><a href="principal.php">Feed</a></li>
                    <li class="list-group-item"><a href="worldwide.php">WorldWide</a></li>
                </ul>';
                echo $html;
        }
    }
    
    public function verificaAmizade($idUsuario, $idAmigo){
        $amizade = $this->usuarioDao->selectAmigoById($idUsuario, $idAmigo);
        return isset($amizade[0]) ? true : false;
        
    }
    
    public function seguir($idUsuario, $idAmigo){
        $this->usuarioDao->insertAmizade($idUsuario, $idAmigo);
    }
    
    public function deixarDeSeguir($idUsuario, $idAmigo){
        $this->usuarioDao->deleteAmizade($idUsuario, $idAmigo);
    }
    
    public function cadastrarUsuario($POST){
        $this->usuario->setNome($POST['nome']);
        $this->usuario->setEmail($POST['email']);
        $this->usuario->setLogin($POST['usuario']);
        $this->usuario->setSenha($POST['senha']);
        $this->usuario->setFoto('sir.jpg');
        
        $this->usuarioDao->insertUsuario($this->usuario);
        
    }
    
    public function getSeguidores($idUsuario){
        
        $lista = $this->usuarioDao->selectSeguidores($idUsuario);
        
        if($lista){
            foreach ($lista as $key => $usuario){
                $html = '<div class="col-xs-12 col-md-3">
                            <img class="foto-perfil" src="'.PASTAIMG.$usuario->foto.'" alt="Foto perfil" title="Foto perfil"/>
                            <ul class="list-group">
                                <li class="list-group-item"><a href="perfil.php?userId='.$usuario->id.'">@'.$usuario->usuario.'</a></li>
                            </ul>
                        </div>';

                echo $html;
            }
        }
        
    }
    
    public function getUsuario($login){
        $usuario = $this->usuarioDao->selectUsuarioByLogin($login);
        return $usuario[0];
    }
    
    public function autenticar($login, $senha){
        $existe = $this->usuarioDao->selectUsuario($login);
        $existe = $existe[0]->id;
        
        if($existe == 1){
            $usuario = $this->usuarioDao->selectUsuarioByLogin($login);
            echo $existe;
            
            if($usuario[0]->senha == $senha){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    
    function getMenu(){
        $html = '<nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <a class="navbar-brand" href="principal.php" >EdBook</a>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php?logout=true"><i class="glyphicon glyphicon-log-out"></i> Sair</a></li>
                </ul>
            </div>
        </nav>';
        
        echo $html;
    }
    
}


?>