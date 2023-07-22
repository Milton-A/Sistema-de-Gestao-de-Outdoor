<?php

/**
 * Description of MunicipioModel
 *
 * @author Milton Dantas
 */
require_once __DIR__ . '/./IMunicipioRepository.php';
require_once __DIR__.'/../models/MunicipioModel.php';
require_once __DIR__ . '/../dbconfig/DbConnection.php';

class MunicipioRepository implements IMunicipioRepository {

    //put your code here
    private $db;

    public function __construct() {
        $this->db = DbConnection::getInstance();
    }

    public function selectById($id) {
        $stmt = $this->db->prepare("SELECT * FROM municipio where idProvincia = :id");
        $stmt->bindparam(":id", $id);
        $stmt->execute();
        $Municipios = $stmt->fetchAll();
        $listaMunicipios = array();

        foreach ($Municipios as $municipio) {
            $listaMunicipios[] = new MunicipioModel($municipio['id'], $municipio['nome']);
        }
        return $listaMunicipios;
    }

}
