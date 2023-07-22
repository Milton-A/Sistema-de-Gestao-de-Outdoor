<?php

/**
 * Description of ComunaModel
 *
 * @author Milton Dantas
 */
require_once __DIR__ . '/../models/ComunaModel.php';
require_once __DIR__ . '/../dbconfig/DbConnection.php';
require_once __DIR__.'/./IComunaRepository.php';

class ComunaRepository implements IComunaRepository{

    //put your code here

    private $db;

    public function __construct() {
        $this->db = DbConnection::getInstance();
    }

    public function selectById($id) {
        $stmt = $this->db->prepare("SELECT * FROM comuna where idMunicipio = :id ");
        $stmt->bindparam(":id", $id);
        $stmt->execute();
        $comunas = $stmt->fetchAll();
        $listaComunas = array();

        foreach ($comunas as $comuna) {
            $listaComunas[] = new ComunaModel($comuna['id'], $comuna['nome']);
        }

        return $listaComunas;
    }
}
