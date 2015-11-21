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
    
    public function insertAmizade($idUsuario, $idAmigo){
        $data = new DateTime();
        $sql = "INSERT into usuarioamigos (idUsuario, idAmigo, data) VALUES ('".$idUsuario."','".$idAmigo."','".date_format($data, 'Y-m-d')."')";
        $this->sqlExec($sql);        
    }
    
    public function selectAmigoById($idUsuario, $idAmigo){
        $sql = "SELECT * from usuarioAmigos where idUsuario = ".$idUsuario." AND idAmigo = ".$idAmigo;
        return $this->selectSQL($sql);
    }
    
    public function selectAmigos($idUsuario){
        $sql = "SELECT * from usuarioAmigos where idUsuario =".$idUsuario;
        return $this->selectSQL($sql);
    }
    
    public function deleteAmizade($idUsuario, $idAmigo){
        $sql = "DELETE from usuarioAmigos where idUsuario = ".$idUsuario." AND idAmigo = ".$idAmigo;
        $this->sqlExec($sql);
    }
    
    public function insertUsuario(Usuario $usuario){
        $sql = "INSERT into usuario (nome, email, usuario, senha, foto)
            VALUES ('".$usuario->getNome()."','".$usuario->getEmail()."','".$usuario->getLogin()."' ,'".$usuario->getSenha()."', '".$usuario->getFoto()."')";
        $this->sqlExec($sql);
    }
    
    public function selectSeguidores($idUsuario){
        $sql = "SELECT * from usuario where id in(
                SELECT idUsuario from usuarioAmigos where idAmigo = ".$idUsuario.")";
        return $this->selectSQL($sql);
    }
    
    public function selectSeguindo($idUsuario){
        $sql = "SELECT * from usuario where id in(
                SELECT idAmigo from usuarioAmigos where idUsuario = ".$idUsuario.")";
        return $this->selectSQL($sql);
    }
    
    public function selectUsuario($login){
        $sql = "SELECT count(id) as id from usuario where usuario = '".$login."'";
        return $this->selectSQL($sql);
    }
    
    public function selectUsuarioByLogin($login){
        $sql = "SELECT * from usuario where usuario = '".$login."'";
        return $this->selectSQL($sql);
    }
    
}
