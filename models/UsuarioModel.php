<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of UsuarioModel
 *
 * @author Milton Dantas
 */
class UsuarioModel {
    //put your code here
    private $id;
    private $username;
    private $senha;
    private $tipo;
    private $eliminado;
    
    public function __construct($id, $username, $senha, $tipo, $eliminado) {
        $this->id = $id;
        $this->username = $username;
        $this->senha = $senha;
        $this->tipo = $tipo;
        $this->eliminado = $eliminado;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getEliminado() {
        return $this->eliminado;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setUsername($username): void {
        $this->username = $username;
    }

    public function setSenha($senha): void {
        $this->senha = $senha;
    }

    public function setTipo($tipo): void {
        $this->tipo = $tipo;
    }

    public function setEliminado($eliminado): void {
        $this->eliminado = $eliminado;
    }


}
