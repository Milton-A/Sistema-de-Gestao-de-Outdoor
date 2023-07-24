<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPInterface.php to edit this template
 */

/**
 *
 * @author Milton Dantas
 */
interface IAdministradorRepository {
    //put your code here
    public function insert($nome, $email);
    public function selectAll();
    public function selectCount();
    public function update($id, $email);
    public function selectByIdUsuario($idUsuario);
}
