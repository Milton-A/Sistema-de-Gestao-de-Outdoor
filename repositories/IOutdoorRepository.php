<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPInterface.php to edit this template
 */

/**
 *
 * @author Milton Dantas
 */
interface IOutdoorRepository {
    //put your code here
    public function delete($id, $estado);
    public function insert($tipo, $preco, $idComuna, $estado, $idGestor) ;
    public function update($id, $tipo, $preco, $comuna,$idGestor);
    public function selectCount();
    public function selectAll();
}
