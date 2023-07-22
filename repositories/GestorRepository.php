<?php

/**
 * Description of GestorRepository
 *
 * @author Milton Dantas
 */
require_once __DIR__ . '/./IGestorRepository.php';
require_once __DIR__ . '/../models/GestorModel.php';
require_once __DIR__ . '/../dbconfig/DbConnection.php';

class GestorRepository implements IGestorRepository {

    //put your code here
    private $db;

    public function __construct() {
        $this->db = DbConnection::getInstance();
    }

    public function insert($nome, $email, $idComuna, $morada, $telemovel, $idUsuario, $idAdm) {
        try {
            $stmt = $this->db->prepare("INSERT INTO `gestor`(`id`, `nome`, `email`, `idComuna`, `morada`, `telemovel`, `idUsuario`, `idAdm`) "
                    . "VALUES (:nome,:email,:idComuna,:morada,:telemovel,:idUsuario,:idAdm)");
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":idComuna", $idComuna);
            $stmt->bindParam(":morada", $morada);
            $stmt->bindParam(":telemovel", $telemovel);
            $stmt->bindParam(":idUsuario", $idUsuario);
            $stmt->bindParam(":idAdm", $idAdm);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function selectById($id) {
        $stmt = $this->db->prepare("SELECT * FROM gestor where gestor.idGestor = :id ");
        $stmt->bindparam(":id", $id);
        $stmt->execute();
        $gestor = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($gestor != null) {
            return $gestor;
        } else {
            return false;
        }
    }

    public function isFirstLogin($id) {
        $stmt = $this->db->prepare("SELECT `estado` FROM `gestor` WHERE id = :id");
        $stmt->bindparam(":id", $id);
        $stmt->execute();
        $gestor = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($gestor != null) {
            return $gestor['estado'];
        } else {
            return false;
        }
    }

    public function selectAll() {
        $stmt = $this->db->prepare("SELECT g.id, `nome`, `email`, `idComuna`, `morada`, `telemovel`, u.username as username, `estado` FROM gestor g join usuario u on u.id = g.idUsuario where u.eliminado <> 'sim'");
        $stmt->execute();
        $usersData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $users = [];
        foreach ($usersData as $userData) {
            $user = new GestorModel(
                    $userData['id'],
                    $userData['nome'],
                    $userData['email'],
                    $userData['idComuna'],
                    $userData['morada'],
                    $userData['telemovel'],
                    $userData['username'],
                    $userData['estado']
            );
            $users[] = $user;
        }
        return $users;
    }
    
    public function update($id,$nome, $email, $idComuna, $morada, $telemovel) {
        try {
            $stmt = $this->db->prepare("UPDATE gestor SET nome = :nome, email = :email, idComuna = :idComuna, morada = :morada, telemovel = :telemovel WHERE id = :id");
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":idComuna", $idComuna);
            $stmt->bindParam(":morada", $morada);
            $stmt->bindParam(":telemovel", $telemovel);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function alterarEstado($id, $estado) {
        try {
            $stmt = $this->db->prepare("UPDATE `gestor` SET `estado`=:estado WHERE idGestor = :id");
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":estado", $estado);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function selectCount() {
        try {
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM `gestor` join usuario on usuario.id = gestor.idusuario where usuario.eliminado <> 'sim'");
            $stmt->execute();
            $adm = $stmt->fetchColumn(); // Obtenha todos os resultados em vez de apenas uma linha
            return $adm;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

}
