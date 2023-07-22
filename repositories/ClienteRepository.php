<?php

require_once __DIR__ . '/../models/ClienteModel.php';
require_once __DIR__ . '/../dbconfig/DbConnection.php';
require_once __DIR__ . '/../repositories/IClienteRepository.php';

class ClienteRepository implements IClienteRepository {

    private $db;

    public function __construct() {
        $this->db = DbConnection::getInstance();
    }

    public function insertCliente($nomeCompleto, $tipoCliente, $actividadeEmpresa, $comuna, $nacionalidade, $morada, $email, $telemovel, $idUsuario) {
        try {
            $stmt = $this->db->prepare("INSERT INTO `cliente`(`nome`, `tipo`, `actividade`, `idComuna`, `nacionalidade`, `morada`, `email`, `telemovel`, `idUsuario`) "
                    . "VALUES (:nome, :tipo, :actividade,:comuna, :nacionalidade,:morada, :email, :telemovel, :idUsuario)");
            $stmt->bindParam(":nome", $nomeCompleto);
            $stmt->bindParam(":tipo", $tipoCliente);
            $stmt->bindParam(":nacionalidade", $nacionalidade);
            $stmt->bindParam(":actividade", $actividadeEmpresa);
            $stmt->bindParam(":comuna", $comuna);
            $stmt->bindParam(":morada", $morada);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":telemovel", $telemovel);
            $stmt->bindParam(":idUsuario", $idUsuario);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function selectById($id) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM cliente where id = :id ");
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            $userData = $stmt->fetch(PDO::FETCH_ASSOC);
            $user = new ClienteModel(
                    $userData['id'],
                    $userData['nome'],
                    $userData['tipo'],
                    $userData['actividade'],
                    $userData['idComuna'],
                    $userData['nacionalidade'],
                    $userData['morada'],
                    $userData['email'],
                    $userData['telemovel'],
                    $userData['estado'],
                    $userData['idAdm']
            );
            if ($user != null) {
                return $user;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function selectByIdUsuario($idUsuario) {
        try {
            $stmt = $this->db->prepare("SELECT c.id, `nome`, c.tipo, `actividade`, `idComuna`, `nacionalidade`, `morada`, `email`, `telemovel`, `idUsuario`, `idAdm`, `estado` FROM cliente c join usuario u on u.id = c.idUsuario where u.id = :id");
            $stmt->bindparam(":id", $idUsuario);
            $stmt->execute();
            $userData = $stmt->fetch(PDO::FETCH_ASSOC);
            $user = new ClienteModel(
                    $userData['id'],
                    $userData['nome'],
                    $userData['tipo'],
                    $userData['actividade'],
                    $userData['idComuna'],
                    $userData['nacionalidade'],
                    $userData['morada'],
                    $userData['email'],
                    $userData['telemovel'],
                    $userData['estado'],
                    $userData['idAdm']
            );
            if ($user != null) {
                return $user;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function selectAll() {
        $stmt = $this->db->prepare("SELECT cliente.id, cliente.nome, `tipo`, `actividade`, comuna.nome `idComuna`, `nacionalidade`, `morada`, `email`, `telemovel`, `idUsuario`, `idAdm`, `estado` FROM `cliente` join comuna on comuna.id = cliente.idComuna");
        $stmt->execute();
        $usersData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $users = [];
        foreach ($usersData as $userData) {
            $user = new ClienteModel(
                    $userData['id'],
                    $userData['nome'],
                    $userData['tipo'],
                    $userData['actividade'],
                    $userData['idComuna'],
                    $userData['nacionalidade'],
                    $userData['morada'],
                    $userData['email'],
                    $userData['telemovel'],
                    $userData['estado'],
                    $userData['idAdm']
            );
            $users[] = $user;
        }
        return $users;
    }

    public function alterarUtilizador($id, $nomeCompleto, $comuna, $nacionalidade, $morada, $email, $telemovel) {
        try {
            $stmt = $this->db->prepare("UPDATE `cliente` SET `nome`= :nome,`idComuna`= :idComuna,`nacionalidade`= :nacionalidade,`morada`= :morada,`email`= :email,`telemovel`= :telemovel WHERE id=:id");
            $stmt->bindParam(":nome", $nomeCompleto);
            $stmt->bindParam(":idComuna", $comuna);
            $stmt->bindParam(":nacionalidade", $nacionalidade);
            $stmt->bindParam(":morada", $morada);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":telemovel", $telemovel);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function setEstado($estado, $id) {
        try {
            $stmt = $this->db->prepare("UPDATE cliente SET estado = :estado WHERE id = :id");
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
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM cliente c join usuario u on u.id = c.idUsuario where u.eliminado <> 'sim'");
            $stmt->execute();
            $adm = $stmt->fetchColumn(); // Obtenha todos os resultados em vez de apenas uma linha
            return $adm;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

}
