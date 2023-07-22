<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of AdministradorRepository
 *
 * @author Milton Dantas
 */

require_once __DIR__ . '/./IAdministradorRepository.php';
require_once __DIR__ . '/../dbconfig/DbConnection.php';
require_once __DIR__ . '/../models/AdministradorModel.php';

class AdministradorRepository  implements IAdministradorRepository{
    //put your code here
    private $db = null;

    public function __construct() {
        $this->db = DbConnection::getInstance();
    }
    
    public function insert($nome, $email) {
        try {
            $stmt = $this->db->prepare("INSERT INTO `administrador`(`nome`,`email`) VALUES (:nome, :email)");
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function selectAll() {
        try {
            $stmt = $this->db->prepare("SELECT a.id, a.nome, `email`, u.username, c.nome as comuna FROM administrador a join comuna c on c.id=a.idComuna join usuario u on u.id = a.idUsuario");
            $stmt->execute();
            $usersData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $users = [];
            foreach ($usersData as $userData) {
                $user = new AdministradorModel(
                        $userData['id'],
                        $userData['nome'],
                        $userData['email'],
                        $userData['username'],
                        $userData['comuna'],
                );
                $users[] = $user;
            }
            return $users;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function selectCount() {
        try {
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM `administrador` join usuario u on u.id=administrador.idUsuario where u.eliminado <> 'sim'");
            $stmt->execute();
            $adm = $stmt->fetchColumn();
            return $adm;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function update($id, $email) {
        try {
            $stmt = $this->db->prepare("UPDATE administrador SET email = :email WHERE id = :id");
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
