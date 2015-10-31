<?php

/**
 * Descrição da classe UsuarioDAO
 * @author EDIMAR
 * @date 31/10/2015
 */
require_once 'BaseDAO.php';

class UsuarioDAO extends BaseDAO{
    
    public function getUsuarioById($idUsuario){
        $sql = "SELECT * from usuario where id = ".$idUsuario;
        return $this->selectSQL($sql);
    }
    
}
