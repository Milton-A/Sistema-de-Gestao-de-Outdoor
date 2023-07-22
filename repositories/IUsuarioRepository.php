<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPInterface.php to edit this template
 */

/**
 *
 * @author Milton Dantas
 */
interface IUsuarioRepository {
    //put your code here
    public function insert ($username, $senha,$tipo);
    public function update ($id, $username, $senha);
    public function delete ($id, $estado);
    public function isUsername($username);
    public function login($username, $senha);
    public function selectById($id);
}
