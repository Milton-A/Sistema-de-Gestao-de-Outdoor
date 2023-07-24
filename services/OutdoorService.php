<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of OutdoorService
 *
 * @author Milton Dantas
 */
require_once __DIR__ . '/./IOutdoorService.php';
require_once __DIR__ . '/../repositories/OutdoordRepository.php';

class OutdoorService implements IOutdoorService {

    //put your code here
    private $outdoorRepository = null;

    public function __construct() {
        $this->outdoorRepository = new OutdoordRepository();
    }

    public function delete($id) {
        if ($id != null) {
            return $this->outdoorRepository->delete($id, "sim");
        } else {
            return false;
        }
    }

    public function insert($tipo, $preco, $idComuna, $idGestor) {
        if ($tipo != null && $preco != null && $idComuna != null && $idGestor != null) {
            return $this->outdoorRepository->insert($tipo, $preco, $idComuna, $idGestor);
        } else {
            return false;
        }
    }

    public function selectAll() {
        return $this->outdoorRepository->selectAll();
    }

    public function selectCount() {
        return $this->outdoorRepository->selectCount();
    }

    public function update($id, $tipo, $preco, $comuna, $idGestor) {
        if ($tipo != null && $preco != null && $comuna != null && $idGestor != null && $id != null) {
            return $this->outdoorRepository->update($id, $tipo, $preco, $comuna, $idGestor);
        } else {
            return false;
        }
    }
    
    public function selectOutdoorByIdPedido($id) {
        return $this->outdoorRepository->selectByIdPedido($id);
    }
    
    public function alterarEstado($id, $estado){
        return $this->outdoorRepository->updateEstado($id, $estado);
    }

}
