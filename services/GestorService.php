<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of GestorService
 *
 * @author Milton Dantas
 */
require_once __DIR__ . '/../repositories/GestorRepository.php';
require_once __DIR__ . '/./IGestorService.php';

class GestorService implements IGestorService {

    //put your code here

    private $gestorRepository = null;

    public function __construct() {
        $this->gestorRepository = new GestorRepository();
    }

    public function inserirGestor($nome, $email, $idComuna, $morada, $telemovel, $idUsuario, $idAdm) {
        return $this->gestorRepository->insert($nome, $email, $idComuna, $morada, $telemovel, $idUsuario, $idAdm);
    }

    public function isFirstLogin($id) {
        return $this->gestorRepository->isFirstLogin($id);
    }

    public function alterarGestor($id, $nome, $email, $idComuna, $morada, $telemovel) {
        return $this->gestorRepository->update($id, $nome, $email, $idComuna, $morada, $telemovel);
    }

    public function alterarEstado($id) {
        return $this->gestorRepository->alterarEstado($id, "on");
    }

    public function verGestores() {
        return $this->gestorRepository->selectAll();
    }
    
    public function getTotal(){
        return $this->gestorRepository->selectCount();
    }

}
