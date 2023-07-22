<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of OutdoorModel
 *
 * @author Milton Dantas
 */
class OutdoorModel {
    //put your code here
    private $id;
    private $tipo;
    private $preco;
    private $comuna;
    private $estado;
    private $eliminado;
    private $idGestor;
    
    public function __construct($id, $tipo, $preco, $comuna, $estado, $eliminado, $idGestor) {
        $this->id = $id;
        $this->tipo = $tipo;
        $this->preco = $preco;
        $this->comuna = $comuna;
        $this->estado = $estado;
        $this->eliminado = $eliminado;
        $this->idGestor = $idGestor;
    }
    public function getId() {
        return $this->id;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function getComuna() {
        return $this->comuna;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getEliminado() {
        return $this->eliminado;
    }

    public function getIdGestor() {
        return $this->idGestor;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setTipo($tipo): void {
        $this->tipo = $tipo;
    }

    public function setPreco($preco): void {
        $this->preco = $preco;
    }

    public function setComuna($comuna): void {
        $this->comuna = $comuna;
    }

    public function setEstado($estado): void {
        $this->estado = $estado;
    }

    public function setEliminado($eliminado): void {
        $this->eliminado = $eliminado;
    }

    public function setIdGestor($idGestor): void {
        $this->idGestor = $idGestor;
    }
}
