<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of GestorController
 *
 * @author Milton Dantas
 */
require_once __DIR__ . '/../services/GestorService.php';

class GestorController {
    //put your code here
    private $gestorService = NULL;

    public function __construct() {
        $this->gestorService = new GestorService();
    }
    
    public function requestHandler() {
        
    }
    
    public function alterarDados() {
        $this->gestorService->alterarGestor($id, $nome, $email, $idComuna, $morada, $telemovel);
    }
    
    public function cadastrarGestor() {
        $this->gestorService->inserirGestor($nome, $email, $idComuna, $morada, $telemovel, $idUsuario, $idAdm);
    }
    
    public function alterarEsatdo(){
        $this->gestorService->alterarEstado($id);
    }
    
    public function verSolicitacoes(){
        
    }
    
    public function verOutdoors(){
        
    }
    
    public function totalOutdoors(){
        
    }
    
    public function aprovarPedido(){
        
    }
    
    public function reprovarPedido(){
        
    }
    
    public function removerOutdoor(){
        
    }
    
    public function alterarOutdoor(){
        
    }
    
    public function validarConta(){
        
    }
}
