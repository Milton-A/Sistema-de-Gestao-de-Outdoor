<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of UsuarioRepository
 *
 * @author Milton Dantas
 */
require_once __DIR__ . '/./IUsuarioRepository.php';
require_once __DIR__ . '/../dbconfig/DbConnection.php';
require_once __DIR__ . '/../models/UsuarioModel.php';

class UsuarioRepository implements IUsuarioRepository {

    //put your code here

    private $db = null;

    public function __construct() {
        $this->db = DbConnection::getInstance();
    }

    public function delete($id, $estado) {
        try {
            $stmt = $this->db->prepare("UPDATE `usuario` SET `eliminado`=:estado WHERE id=:id");
            $stmt->bindparam(":id", $id);
            $stmt->bindparam(":estado", $estado);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function insert($username, $senha, $tipo) {
        try {
            $stmt = $this->db->prepare("INSERT INTO `usuario`(`username`, `senha`, `tipo`) VALUES (:username, :senha, :tipo)");
            $stmt->bindparam(":username", $username);
            $stmt->bindparam(":senha", $senha);
            $stmt->bindparam(":tipo", $tipo);
            $stmt->execute();
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function update($id, $username, $senha) {
        try {
            $stmt = $this->db->prepare("UPDATE `usuario` SET `username`=:username,`senha`=:senha WHERE id=:id");
            $stmt->bindparam(":username", $username);
            $stmt->bindparam(":senha", $senha);
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function isUsername($username) {
        try {
            $stmt = $this->db->prepare("SELECT count(*) FROM usuario WHERE username = :username and eliminado <> 'Sim'");
            $stmt->bindParam(":username", $username);
            $stmt->execute();
            $rowCount = $stmt->fetchColumn();
            if ($rowCount > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function login($username, $senha) {
        try {
            $stmt = $this->db->prepare("SELECT id, username, senha, tipo, eliminado FROM usuario WHERE username = :username and eliminado <> 'Sim'");
            $stmt->bindParam(":username", $username);
            $stmt->execute();
            $dado = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($dado && $senha == $dado['senha']) {
                $Usuario = new UsuarioModel($dado['id'], $dado['username'], null, $dado['tipo'], null);
                return $Usuario;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function selectById($id) {
        try {
            $stmt = $this->db->prepare("SELECT id, username, senha, tipo, eliminado FROM usuario WHERE id = :id and eliminado <> 'Sim'");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $dado = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($dado) {
                $Usuario = new UsuarioModel($dado['id'], $dado['username'], null, $dado['tipo'], null);
                return $Usuario;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

}
