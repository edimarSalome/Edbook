<?php

/**
 * Descrição da classe ComentarioView
 * @author EDIMAR
 * @date 31/10/2015
 */

require __DIR__.'/../model/Comentario.php';
require __DIR__.'/../DAO/ComentarioDAO.php';

class ComentarioView {
    
    private $comentario;
    private $comentarioDAO;
    
    public function __construct() {
        $this->comentario = new Comentario();
        $this->comentarioDAO = new ComentarioDAO();
    }
    
    public function setComentario(){
        $this->comentario->setIdUsuario(1);
        $this->comentario->setReplicas(10);
        $this->comentario->setStars(2);
        $this->comentario->setTexto('Edbook vai bombar na internet!');
        $this->comentario->setData('31/10/2015');
    }
    
    public function getComentarioByUsuario($idUsuario){
        $lista = $this->comentarioDAO->listComentariosByUsuario($idUsuario);
        $this->setComentario();
        
        foreach($lista as $key => $value){
            $replicas = $this->comentarioDAO->getReplicasByComentario($value->id);
            
            $html = '<div class="panel">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-2">
                                    <img src="img/perfil.jpg" alt="Usuario" class="foto-comentario"/>
                                </div>
                                <div class="col-sm-12 col-md-10">
                                    <span class="nome-comentario">@OJusticeiro</span>
                                    <span class="data-comentario">'.$value->data.'</span>
                                    <p>"'.$value->comentario.'"</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <span><a href="#"><i class="glyphicon glyphicon-star"></i> '.$value->stars.'</a></span>
                                    <span><a href="#"><i class="glyphicon glyphicon-share-alt"></i> '.$replicas[0]->qtd.'</a></span>
                                </div>
                            </div>
                        </div>
                    </div>';

            echo $html;
        }
    }
}
