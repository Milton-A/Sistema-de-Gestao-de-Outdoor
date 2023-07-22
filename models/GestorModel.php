<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of GestorModel
 *
 * @author Milton Dantas
 */
class GestorModel {
    private $id;
    private $nome;
    private $email;
    private $comuna;
    private $morada;
    private $telemovel;
    private $idUsuario;
    private $idAdm;
    private $estado;
    
    public function __construct($id, $nome, $email, $comuna, $morada, $telemovel, $username, $estado) {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->comuna = $comuna;
        $this->morada = $morada;
        $this->telemovel = $telemovel;
        $this->idUsuario = $username;
        $this->estado = $estado;
    }
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getComuna() {
        return $this->comuna;
    }

    public function getMorada() {
        return $this->morada;
    }

    public function getTelemovel() {
        return $this->telemovel;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function getIdAdm() {
        return $this->idAdm;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setNome($nome): void {
        $this->nome = $nome;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

    public function setComuna($comuna): void {
        $this->comuna = $comuna;
    }

    public function setMorada($morada): void {
        $this->morada = $morada;
    }

    public function setTelemovel($telemovel): void {
        $this->telemovel = $telemovel;
    }

    public function setIdUsuario($idUsuario): void {
        $this->idUsuario = $idUsuario;
    }

    public function setIdAdm($idAdm): void {
        $this->idAdm = $idAdm;
    }

    public function setEstado($estado): void {
        $this->estado = $estado;
    }
}
