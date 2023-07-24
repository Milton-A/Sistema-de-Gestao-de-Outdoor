<?php

/**
 * Description of SolicitacaoController
 *
 * @author Milton Dantas
 */
require_once __DIR__ . '/../services/SolicitacaoService.php';
require_once __DIR__ . '/../services/OutdoorService.php';

class SolicitacaoController {

    //put your code here
    //put your code here
    private $solicitacaoService = NULL;
    private $outdoorService = null;

    public function __construct() {
        $this->solicitacaoService = new SolicitacaoService();
        $this->outdoorService = new OutdoorService();

        if (isset($_POST['action']) && $_POST['action'] === 'aprovar' && isset($_POST['idAluguer'])) {
            $idOutdoor = $_POST['idAluguer'];
            $this->solicitacaoService->aprovar("aprovado", $idOutdoor);
            $idRequest = $this->outdoorService->selectOutdoorByIdPedido($idOutdoor);
            $this->outdoorService->alterarEstado($idRequest, "Ocupado");
        }
        if (isset($_POST['action']) && $_POST['action'] === 'reprovar' && isset($_POST['idAluguer'])) {
            $idOutdoor = $_POST['idAluguer'];
            $this->solicitacaoService->aprovar("nao aprovado", $idOutdoor);
            $idRequest = $this->outdoorService->selectOutdoorByIdPedido($idOutdoor);
            $this->outdoorService->alterarEstado($idRequest, "Por Validar Pagamento");
        }
    }

    public function requesHandler() {
        
    }

}

$control = new SolicitacaoController();
