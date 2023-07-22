<?php

/**
 * Description of ComunaModel
 *
 * @author Milton Dantas
 */

require_once __DIR__.'/../repositories/ComunaRepository.php';
require_once __DIR__.'/./IComunaService.php';

class ComunaService implements IComunaService{
    //put your code here
    
    private $comunaRepository = NULL;
    
    public function __construct() {
        $this->comunaRepository = new ComunaRepository();
    }
    
    public function getComunas($id) {
        try {
            $res = $this->comunaRepository->selectById($id);
            return $res;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
