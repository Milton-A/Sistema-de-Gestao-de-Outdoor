<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of SolicitacaoService
 *
 * @author Milton Dantas
 */
require_once __DIR__ . '/../repositories/SolicitacaoRepository.php';
require_once __DIR__ . '/./ISolicitacaoService.php';
require_once __DIR__ . '/../repositories/GestorRepository.php';

class SolicitacaoService implements ISolicitacaoService {

    //put your code here
    private $solicitacaoRepository = null;
    private $gestorRepository = null;

    public function __construct() {
        $this->solicitacaoRepository = new SolicitacaoRepository();
        $this->gestorRepository = new GestorRepository();
    }

    public function aprovar($estado, $id) {
        return $this->solicitacaoRepository->aprovar($estado, $id);
    }

    public function carregarRecibo($idSolicitacao, $recibo) {
        return $this->solicitacaoRepository->carregarRecibo($idSolicitacao, $recibo);
    }

    public function insert($idGestor, $idCliente, $imagem, $dataInicio, $dataFim, $totalPagar, $idOutdoor, $recibo) {
        return $this->solicitacaoRepository->insert($idGestor, $idCliente, $imagem, $dataInicio, $dataFim, $totalPagar, $idOutdoor, $recibo);
    }

    public function selectAll() {
        return $this->solicitacaoRepository->selectAll();
    }

    public function selectAllDisponivel() {
        return $this->solicitacaoRepository->selectAllDisponivel();
    }

    public function selectAllEmEspera() {
        return $this->solicitacaoRepository->selectAllEmEspera();
    }

    public function selectAllOcupado() {
        return $this->solicitacaoRepository->selectAllOcupado();
    }

    public function selectAllPorValidar() {
        return $this->solicitacaoRepository->selectAllPorValidar();
    }

    public function selectCount() {
        return $this->solicitacaoRepository->selectCount();
    }

    public function selectGestorPedidos() {
        $outdoors = $this->solicitacaoRepository->selectGestorPedidos();
        if (is_array($outdoors) && !empty($outdoors)) {
            $menor = $outdoors[0];
            $count = 0;
            foreach ($outdoors as $cada) {
                if ($cada['numero_de_pedidos'] < $menor['numero_de_pedidos']) {
                    $menor = $cada;
                } else if ($cada['numero_de_pedidos'] == $menor['numero_de_pedidos']) {
                    $count++;
                }
            }
            if ($count > 1) {
                $gestores = $this->gestorRepository->selectAllIdUser();
                if (count($gestores) > 0) {
                    $pos = rand(0, count($gestores) - 1);
                   return  $idGestorAleatorio = $gestores[$pos]->getIdUsuario();
                }
            } else {
               return $menor['idUsuario'];
            }
        }
    }

    public function update($idSolicitacao, $idGestor) {
        return $this->solicitacaoRepository->update($idSolicitacao, $idGestor);
    }

    public function validarRecibo($idSolicitacao) {
        return $this->solicitacaoRepository->validarRecibo($idSolicitacao);
    }

}
