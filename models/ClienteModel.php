<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Cliente
 *
 * @author Milton Dantas
 */
// Arquivo: Cliente.php

class ClienteModel {

    private $id;
    private $nomeCompleto;
    private $tipoCliente;
    private $actividadeEmpresa;
    private $comuna;
    private $nacionalidade;
    private $morada;
    private $email;
    private $telemovel;
    private $adm;
    private $estado;

    public function __construct($id, $nomeCompleto, $tipoCliente, $actividadeEmpresa, $comuna, $nacionalidade, $morada, $email, $telemovel, $estado, $adm) {
        $this->id = $id;
        $this->nomeCompleto = $nomeCompleto;
        $this->tipoCliente = $tipoCliente;
        $this->actividadeEmpresa = $actividadeEmpresa;
        $this->comuna = $comuna;
        $this->nacionalidade = $nacionalidade;
        $this->morada = $morada;
        $this->email = $email;
        $this->telemovel = $telemovel;
        $this->adm = $adm;
        $this->estado = $estado;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado): void {
        $this->estado = $estado;
    }

    public function getAdm() {
        return $this->adm;
    }

    public function setAdm($adm): void {
        $this->adm = $adm;
    }

    public function getId() {
        return $this->id;
    }

    public function getNomeCompleto() {
        return $this->nomeCompleto;
    }

    public function getTipoCliente() {
        return $this->tipoCliente;
    }

    public function getActividadeEmpresa() {
        return $this->actividadeEmpresa;
    }

    public function getComuna() {
        return $this->comuna;
    }

    public function getNacionalidade() {
        return $this->nacionalidade;
    }

    public function getMorada() {
        return $this->morada;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTelemovel() {
        return $this->telemovel;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setNomeCompleto($nomeCompleto): void {
        $this->nomeCompleto = $nomeCompleto;
    }

    public function setTipoCliente($tipoCliente): void {
        $this->tipoCliente = $tipoCliente;
    }

    public function setActividadeEmpresa($actividadeEmpresa): void {
        $this->actividadeEmpresa = $actividadeEmpresa;
    }

    public function setComuna($comuna): void {
        $this->comuna = $comuna;
    }

    public function setNacionalidade($nacionalidade): void {
        $this->nacionalidade = $nacionalidade;
    }

    public function setMorada($morada): void {
        $this->morada = $morada;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

    public function setTelemovel($telemovel): void {
        $this->telemovel = $telemovel;
    }

}
