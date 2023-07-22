<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPInterface.php to edit this template
 */

/**
 *
 * @author Milton Dantas
 */
interface IAdministradorService {

    //put your code here
    public function cadastrarAdm($nome, $email);

    public function alterarEmail($id, $email);

    public function verAdministrdores();

    public function verTotalAdministradores();

    public function selectCount();
}
