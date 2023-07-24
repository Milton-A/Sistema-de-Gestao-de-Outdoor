<?php

/**
 *
 * @author Milton Dantas
 */
interface IGestorRepository {

    //put your code here
    public function insert($nome, $email, $idComuna, $morada, $telemovel, $idUsuario, $idAdm);

    public function selectById($id);

    public function isFirstLogin($id);

    public function selectAll();

    public function update($id, $nome, $email, $idComuna, $morada, $telemovel);

    public function alterarEstado($id, $estado);

    public function selectCount();

    public function selectByIdUsuario($id);
    
    public function selectAllIdUser();
}
