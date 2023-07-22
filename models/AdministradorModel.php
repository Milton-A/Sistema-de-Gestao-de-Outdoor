<?php


/**
 * Description of AdministradorModel
 *
 * @author Milton Dantas
 */
class AdministradorModel {
    // Propriedades do Administrador
    private $id;
    private $nome;
    private $email;
    private $idUsuario;
    private $comuna;
    
    public function __construct($id, $nome, $email, $idUsuario, $comuna) {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->idUsuario = $idUsuario;
        $this->comuna = $comuna;
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function getComuna() {
        return $this->comuna;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setNome($nome): void {
        $this->nome = $nome;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

    public function setIdUsuario($idUsuario): void {
        $this->idUsuario = $idUsuario;
    }

    public function setComuna($comuna): void {
        $this->comuna = $comuna;
    } 
}
