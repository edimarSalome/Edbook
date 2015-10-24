<?php

/**
 * Descrição da classe Comentario
 * @author EDIMAR
 * @date 17/10/2015
 */
class Comentario {
    private $idUsuario;
    private $texto;
    private $data;
    private $stars;
    private $replicas;
    
    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function getTexto() {
        return $this->texto;
    }

    public function getData() {
        return $this->data;
    }

    public function getStars() {
        return $this->stars;
    }

    public function getReplicas() {
        return $this->replicas;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function setTexto($texto) {
        $this->texto = $texto;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function setStars($stars) {
        $this->stars = $stars;
    }

    public function setReplicas($replicas) {
        $this->replicas = $replicas;
    }

}
