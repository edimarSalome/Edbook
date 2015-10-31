<?php

/**
 * Descrição da classe BaseDAO
 * @author EDIMAR
 * @date 30/10/2015
 */
class BaseDAO {
    private $conn;
    
    public function __construct() {
        $this->conectar();
    }
    
    public function conectar(){
        $this->conn = new PDO('mysql:host=localhost;dbname=edbook', 'root', '');
        $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        
        if($this->conn){
            echo 'Conectado ao banco';
        }else{
            echo 'falha na conexão!';
        }
    }
    
    public function selectSQL($sql){
        $stmt = $this->conn->prepare($sql);
        
        $stmt->execute();
        return $stmt->fetchAll();
    }
}