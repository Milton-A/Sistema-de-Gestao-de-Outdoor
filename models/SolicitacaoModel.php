<?php

/**
 * Description of SolicitacaoModel
 *
 * @author Milton Dantas
 */
class SolicitacaoModel {

    //put your code here
    private $id;
    private $idGestor;
    private $imagem;
    private $dataInicio;
    private $dataFim;
    private $totalPagar;
    private $idOutdoor;
    private $eliminado;
    private $estadoPedido;
    private $estadoOutdoor;
    private $recibo;
    
    public function __construct($id, $idGestor, $imagem, $dataInicio, $dataFim, $totalPagar, $idOutdoor, $eliminado, $estadoPedido, $estadoOutdoor, $recibo) {
        $this->id = $id;
        $this->idGestor = $idGestor;
        $this->imagem = $imagem;
        $this->dataInicio = $dataInicio;
        $this->dataFim = $dataFim;
        $this->totalPagar = $totalPagar;
        $this->idOutdoor = $idOutdoor;
        $this->eliminado = $eliminado;
        $this->estadoPedido = $estadoPedido;
        $this->estadoOutdoor = $estadoOutdoor;
        $this->recibo = $recibo;
    }

    public function getId() {
        return $this->id;
    }

    public function getIdGestor() {
        return $this->idGestor;
    }

    public function getImagem() {
        return $this->imagem;
    }

    public function getDataInicio() {
        return $this->dataInicio;
    }

    public function getDataFim() {
        return $this->dataFim;
    }

    public function getTotalPagar() {
        return $this->totalPagar;
    }

    public function getIdOutdoor() {
        return $this->idOutdoor;
    }

    public function getEliminado() {
        return $this->eliminado;
    }

    public function getEstadoPedido() {
        return $this->estadoPedido;
    }

    public function getEstadoOutdoor() {
        return $this->estadoOutdoor;
    }

    public function getRecibo() {
        return $this->recibo;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setIdGestor($idGestor): void {
        $this->idGestor = $idGestor;
    }

    public function setImagem($imagem): void {
        $this->imagem = $imagem;
    }

    public function setDataInicio($dataInicio): void {
        $this->dataInicio = $dataInicio;
    }

    public function setDataFim($dataFim): void {
        $this->dataFim = $dataFim;
    }

    public function setTotalPagar($totalPagar): void {
        $this->totalPagar = $totalPagar;
    }

    public function setIdOutdoor($idOutdoor): void {
        $this->idOutdoor = $idOutdoor;
    }

    public function setEliminado($eliminado): void {
        $this->eliminado = $eliminado;
    }

    public function setEstadoPedido($estadoPedido): void {
        $this->estadoPedido = $estadoPedido;
    }

    public function setEstadoOutdoor($estadoOutdoor): void {
        $this->estadoOutdoor = $estadoOutdoor;
    }

    public function setRecibo($recibo): void {
        $this->recibo = $recibo;
    }
}
