<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPInterface.php to edit this template
 */

/**
 *
 * @author Milton Dantas
 */
interface IGestorService {
    //put your code here
    public function inserirGestor($nome, $email, $idComuna, $morada, $telemovel, $idUsuario, $idAdm);
    public function isFirstLogin($id);
    public function alterarGestor($id, $nome, $email, $idComuna, $morada, $telemovel);
    public function alterarEstado($id);
    public function verGestores();
    public function selectByIdUsuario($id);
    public function selectById($id);
}
