<?php

/**
 *
 * @author Milton Dantas
 */
interface IClienteRepository {

    //put your code here
    public function insertCliente($nomeCompleto, $tipoCliente, $actividadeEmpresa, $comuna, $nacionalidade, $morada, $email, $telemovel, $idUsuario);

    public function selectById($id);

    public function selectAll();

    public function alterarUtilizador($id, $nomeCompleto, $comuna, $nacionalidade, $morada, $email, $telemovel);

    public function setEstado($estado, $id);
    
    public function selectCount();
}
