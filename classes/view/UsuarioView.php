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
    
    public function setUsuario(){        
        $this->usuario->setId(1);
        $this->usuario->setNome("Frank Castle");
        $this->usuario->setEmail('frank@castle.com');
        $this->usuario->setLogin('Ojusticeiro');
        $this->usuario->setSenha('admin123');
        $this->usuario->setFoto('img/perfil.jpg');
    }
    
    public function getUsuario(){
        return $this->usuario;
    }
    
    public function getPerfilUsuario($idUsuario){
        $usuario = $this->usuarioDao->getUsuarioById($idUsuario);
        
        foreach ($usuario as $key => $value) {
            $html = '<div class="panel-body">
                        <div class="col-sm-4">
                            <img class="foto-perfil" src="img/'.$value->foto.'" />
                        </div>
                        <div class="col-sm-8">
                            <h3>@'.$value->usuario.'</h3>
                            <p>'.$value->nome.'</p>
                            <span>'.$value->email.'</span>
                            <div class="row">
                                <div class="col-sm-12" style="margin-top:30px;">
                                    <a class="btn btn-primary"><i class="glyphicon glyphicon-road"></i> Seguir</a>
                                    <a class="btn btn-default"><i class="glyphicon glyphicon-user"></i> Ver amigos</a>
                                </div>
                            </div>
                        </div>
                    </div>';

            echo $html;
        }
    }
    
}


?>