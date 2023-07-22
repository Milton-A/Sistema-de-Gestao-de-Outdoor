<?php
/**
 * Description of MunicipioModel
 *
 * @author Milton Dantas
 */

require_once __DIR__.'/./IMunicipioService.php';
require_once __DIR__.'/../repositories/MunicipioRepository.php';

class MunicipioService implements IMunicipioService{
    //put your code here
    
    private $municipioRepository = NULL;
    
    public function __construct() {
        $this->municipioRepository = new MunicipioRepository();
    }
    
    public function getMunicipios($id) {
        try {
            $res = $this->municipioRepository->selectById($id);
            return $res;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
