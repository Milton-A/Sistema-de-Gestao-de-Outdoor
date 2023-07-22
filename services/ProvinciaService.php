<?php
/**
 * Description of ProvinciaModel
 *
 * @author Milton Dantas
 */

require_once __DIR__.'/../repositories/ProvinciaRepository.php';
require_once __DIR__.'/./IProvinciaService.php';

class ProvinciaService implements IProvinciaService{
    //put your code here
    
    private $provinciaRepository = NULL;
    
    public function __construct() {
        $this->provinciaRepository = new ProvinciaRepository();
    }
    
    public function getProvincias() {
        try {
            $res = $this->provinciaRepository->selectAll();
            return $res;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
