<?php

/**
 * Description of SolicitacaoController
 *
 * @author Milton Dantas
 */
require_once __DIR__ . '/../services/SolicitacaoService.php';

class SolicitacaoController {

    //put your code here
    //put your code here
    private $solicitacaoService = NULL;

    public function __construct() {
        $this->solicitaService = new SolicitacaoService();
        if (isset($_POST['action']) && $_POST['action'] === 'aprovar' && isset($_POST['idAluguer'])) {
            $idOutdoor = $_POST['idAluguer'];
            $this->solicitaService->aprovar($idOutdoor);
        }
        if (isset($_POST['action']) && $_POST['action'] === 'reprovar' && isset($_POST['idAluguer'])) {
            $idOutdoor = $_POST['idAluguer'];
            $this->solicitaService->reprovar($idOutdoor);
        }
    }

    public function requesHandler() {
        
    }

}
