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
    
    public function listFeed($idUsuario){
        $sql = "SELECT * FROM COMENTARIO
                where idUsuario = ".$idUsuario." OR idUsuario in (
                    select idAmigo from usuarioamigos 
                    where idUsuario = ".$idUsuario."
                ) ORDER BY data desc";
        return $this->selectSQL($sql);
    }
    
    public function getReplicasByComentario($idComentario){
        $sql = "SELECT count(id) as qtd from replica where idComentario =".$idComentario;
        return $this->selectSQL($sql);
    }
    
    public function insertComentario($idUsuario, $comentario){
        $data = new DateTime();        
        $sql = "INSERT into comentario (idUsuario, comentario, data)
                VALUES ('".$idUsuario."','".$comentario."','".  date_format($data, 'Y-m-d H:i:s')."')";
        $this->sqlExec($sql);
    }
    
}
