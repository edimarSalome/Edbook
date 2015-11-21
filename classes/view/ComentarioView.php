<?php

/**
 * Descrição da classe ComentarioView
 * @author EDIMAR
 * @date 31/10/2015
 */

require __DIR__.'/../model/Comentario.php';
require __DIR__.'/../DAO/ComentarioDAO.php';
require_once __DIR__.'/../DAO/UsuarioDAO.php';

class ComentarioView {
    
    private $comentario;
    private $comentarioDAO;
    
    public function __construct() {
        $this->comentario = new Comentario();
        $this->comentarioDAO = new ComentarioDAO();
    }
    
    public function getComentarioByUsuario($idUsuario){
        $lista = $this->comentarioDAO->listComentariosByUsuario($idUsuario);
        $usuarioDao = new UsuarioDAO();
        $usuario = $usuarioDao->getUsuarioById($idUsuario);
        $usuario = isset($usuario[0]) ? $usuario[0] : null;
        
        foreach($lista as $key => $value){
            $replicas = $this->comentarioDAO->getReplicasByComentario($value->id);
            $replicas = isset($replicas[0]->qtd) ? $replicas[0]->qtd : 0;
            $data = new DateTime($value->data);
            
            $html = '<div class="panel">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-2">
                                    <img src="'.PASTAIMG.$usuario->foto.'" alt="Foto usuario" class="foto-comentario"/>
                                </div>
                                <div class="col-sm-12 col-md-10">
                                    <span class="nome-comentario"><a href="perfil.php?userId='.$usuario->id.'">@'.$usuario->usuario.'</a></span>
                                    <span class="data-comentario">'.date_format($data, 'd/m/Y H:i:s').'</span>
                                    <p>"'.$value->comentario.'"</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <span style="float:right;">
                                        <form method="post" style="float:left;">
                                            <input type="hidden" name="addStar" value="true" />
                                            <input type="hidden" name="idComentario" value="'.$value->id.'" />
                                            <button type="submit" class="btn btn-link"><i class="glyphicon glyphicon-star"></i></button>
                                        </form>'.$value->stars.'</span>
                                    <span style="float:right;">
                                        <form method="post" style="float:left;">
                                            <input type="hidden" name="replicar" value="true" />
                                            <input type="hidden" name="idComentario" value="'.$value->id.'" />
                                            <button type="submit" class="btn btn-link">
                                                <i class="glyphicon glyphicon-share-alt"></i>
                                            </button>
                                        </form>'.$replicas.'</span>
                                </div>
                            </div>
                        </div>
                    </div>';

            echo $html;
        }
    }
    
    public function getFeedByUsuario($idUsuario){
        $lista = $this->comentarioDAO->listFeed($idUsuario);
        $usuarioDao = new UsuarioDAO();
        
        foreach($lista as $key => $value){
            $usuario = $usuarioDao->getUsuarioById($value->idUsuario);
            $usuario = isset($usuario[0]) ? $usuario[0] : null;
        
            $replicas = $this->comentarioDAO->getReplicasByComentario($value->id);
            $replicas = isset($replicas[0]->qtd) ? $replicas[0]->qtd : 0;
            $data = new DateTime($value->data);
            
            $html = '<div class="panel">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-2">
                                    <img src="'.PASTAIMG.$usuario->foto.'" alt="Foto usuario" class="foto-comentario"/>
                                </div>
                                <div class="col-sm-12 col-md-10">
                                    <span class="nome-comentario"><a href="perfil.php?userId='.$usuario->id.'">@'.$usuario->usuario.'</a></span>
                                    <span class="data-comentario">'.date_format($data, 'd/m/Y H:i:s').'</span>
                                    <p>"'.$value->comentario.'"</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <span style="float:right;">
                                        <form method="post" style="float:left;">
                                            <input type="hidden" name="addStar" value="true" />
                                            <input type="hidden" name="idComentario" value="'.$value->id.'" />
                                            <button type="submit" class="btn btn-link"><i class="glyphicon glyphicon-star"></i></button>
                                        </form>'.$value->stars.'</span>
                                    <span style="float:right;">
                                        <form method="post" style="float:left;">
                                            <input type="hidden" name="replicar" value="true" />
                                            <input type="hidden" name="idComentario" value="'.$value->id.'" />
                                            <button type="submit" class="btn btn-link">
                                                <i class="glyphicon glyphicon-share-alt"></i>
                                            </button>
                                        </form>'.$replicas.'</span>
                                </div>
                            </div>
                        </div>
                    </div>';

            echo $html;
        }
    }
    
    public function comentar($idUsuario, $comentario){
        $this->comentarioDAO->insertComentario($idUsuario, $comentario);
    }
    
    public function addStar($idComentario){
        $this->comentarioDAO->insertStar($idComentario);
    }
    
    public function replicar($idComentario, $idUsuario){
        $this->comentarioDAO->insertReplica($idComentario, $idUsuario);
    }
}
