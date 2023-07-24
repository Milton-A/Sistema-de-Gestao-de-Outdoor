<?php

/**
 *
 * @author Milton Dantas
 */
interface IClienteService {
    //put your code here
    public function insertCliente($nomeCompleto, $tipoCliente, $actividadeEmpresa, $comuna, $nacionalidade, $morada, $email, $telemovel,$idUsuario);
    public function alterarUtilizador($id, $nomeCompleto, $comuna, $nacionalidade, $morada, $email, $telemovel);
    public function bloquearCliente($id);
    public function desbloquearCliente($id);
    public function ativarCliente($id);
    public function showClientes();
    public function getTotalClientes() ;
    public function selectByIdUsuario($id);
     public function selectById($id);
      public function consultarSolicitacoes($id);
}
