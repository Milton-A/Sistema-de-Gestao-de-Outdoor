<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of AdministradorService
 *
 * @author Milton Dantas
 */
require_once __DIR__ . '/./IAdministradorService.php';
require_once __DIR__ . '/../repositories/AdministradorRepository.php';

class AdministradorService implements IAdministradorService {

    //put your code here

    private $admRepository = NULL;

    public function __construct() {
        $this->admRepository = new AdministradorRepository();
    }

    public function cadastrarAdm($nome, $email) {
        if ($nome != null && $email != null)
            return $this->admRepository->insert($nome, $email);
        else
            return false;
    }

    public function alterarEmail($id, $email) {
        if ($id != null & $nome != null)
            return $this->admRepository->update($id, $email);
        else
            return false;
    }

    public function verAdministrdores() {
        return $this->admRepository->selectAll();
    }

    public function verTotalAdministradores() {
        return $this->admRepository->selectCount();
    }

    public function selectCount() {
        return $this->admRepository->selectCount();
    }

    public function selectByIdUsuario($id) {
        if ($id != null)
            return $this->admRepository->selectByIdUsuario($idUsuario);
        else {
            return false;
        }
    }

}
