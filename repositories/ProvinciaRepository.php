<?php

/**
 * Description of ProvinciaModel
 *
 * @author Milton Dantas
 */
require_once __DIR__ . '/../models/ProvinciaModel.php';
require_once __DIR__ . '/../dbconfig/DbConnection.php';
require_once __DIR__ . '/./IProvinciaRepository.php';

class ProvinciaRepository implements IProvinciaRepository {

    //put your code here
    private $db;

    public function __construct() {
        $this->db = DbConnection::getInstance();
    }

    public function selectAll() {
        $provincias = Array();
        $stmt = $this->db->prepare("SELECT * FROM provincia");
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $prov) {
            $provincias[] = new ProvinciaModel($prov['id'], $prov['nome']);
        }
        return $provincias;
    }

}
