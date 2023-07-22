<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPInterface.php to edit this template
 */

/**
 *
 * @author Milton Dantas
 */
interface IUsuarioService {
    //put your code here
    
    public function isUsernameExist($username);
    public function criarUsuario($username, $tipo, $senha);
    public function alterarUsuario($id,$username, $senha);
    public function eliminarUsuario($id);
    public function login($username, $senha);
    public function selectById($id);
}
