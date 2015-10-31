<?php

/**
 * Descrição da classe ComentarioDAO
 * @author EDIMAR
 * @date 31/10/2015
 */
require_once 'BaseDAO.php';

class ComentarioDAO extends BaseDao{
    
    public function listComentariosByUsuario($idUsuario){
        $sql = "SELECT * FROM COMENTARIO WHERE idUsuario =".$idUsuario;
        return $this->selectSQL($sql);
    }
    
    public function getReplicasByComentario($idComentario){
        $sql = "SELECT count(id) as qtd from replica where idComentario =".$idComentario;
        return $this->selectSQL($sql);
    }
    
}
