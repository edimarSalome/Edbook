<?php

/**
 * Descrição da classe UsuarioView
 * @author EDIMAR
 * @date 17/10/2015
 */
require __DIR__.'/../model/Usuario.php';

class UsuarioView {
    
    private $usuario;
    private $usuarioDao;
    
    function __construct() {
        $this->usuario = new Usuario();
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
    
    public function getPerfilUsuario(){
        $html = '<div class="panel-body">
                    <div class="col-sm-4">
                        <img class="foto-perfil" src="'.$this->usuario->getFoto().'" />
                    </div>
                    <div class="col-sm-8">
                        <h3>@'.$this->usuario->getLogin().'</h3>
                        <p>'.$this->usuario->getNome().'</p>
                        <span>'.$this->usuario->getEmail().'</span>
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


?>