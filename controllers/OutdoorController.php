<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of OutdoorController
 *
 * @author Milton Dantas
 */
require_once __DIR__ . '/../services/OutdoorService.php';

class OutdoorController {

    private $outdorServer = NULL;

    public function __construct() {
        $this->outdorServer = new OutdoorService();

        if (filter_input(INPUT_POST, 'action') !== null && filter_input(INPUT_POST, 'action') === 'eliminar' && filter_input(INPUT_POST, 'id') !== null) {
            $idOutdoor = filter_input(INPUT_POST, 'id');
            $this->outdorServer->delete($idOutdoor);
        }
        if (filter_input(INPUT_POST, 'action')!== null && filter_input(INPUT_POST, 'action') === 'alterar' && filter_input(INPUT_POST, 'id') !==null) {
            $idOutdoor = filter_input(INPUT_POST, 'id');
            $tipo = filter_input(INPUT_POST, 'tipo');
            $comuna = filter_input(INPUT_POST, 'comuna');
            $preco = filter_input(INPUT_POST, 'preco');

            $this->outdorServer->update($id, $tipo, $preco, $comuna, $idGestor);
        }
    }

    public function requesHandler() {
        
    }
    
    public function showOutdoors() {
        $listaOutdoors = $this->outdorServer->selectAll();
        include __DIR__ . '/../views/outdoors.php';
    }

}

$outdoors = new OutdoorController();
