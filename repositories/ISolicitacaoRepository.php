<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPInterface.php to edit this template
 */

/**
 *
 * @author Milton Dantas
 */
interface ISolicitacaoRepository {
    //put your code here
    public function selectCount();
    public function selectGestorPedidos();
    public function selectAll();
    public function selectAllEmEspera();
    public function aprovar($estado, $id);
    public function insert($idGestor, $idCliente, $imagem, $dataInicio, $dataFim, $totalPagar, $idOutdoor, $recibo);
    public function update($idSolicitacao, $idGestor);
    public function validarRecibo($idSolicitacao);
    public function carregarRecibo($idSolicitacao, $recibo);
}
