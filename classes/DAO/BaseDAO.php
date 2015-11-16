<?php

/**
 * Descrição da classe BaseDAO
 * @author EDIMAR
 * @date 30/10/2015
 */
require (__DIR__.'/../config.php');

class BaseDAO {
    private $conn;
    
    public function __construct() {
        $this->conectar();
    }
    
    public function conectar(){
        $this->conn = new PDO('mysql:host='.HOST.';dbname='.DATABASE, USER, PASS);
        $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }
    
    public function selectSQL($sql){
        $stmt = $this->conn->prepare($sql);
        
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function sqlExec($sql){
        $stmt = $this->conn->prepare($sql);
        
        $stmt->execute();
    }
}