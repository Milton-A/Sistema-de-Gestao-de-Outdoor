<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of OutdoordRepository
 *
 * @author Milton Dantas
 */

require_once __DIR__ . '/./IOutdoorRepository.php';
require_once __DIR__ . '/../dbconfig/DbConnection.php';
require_once __DIR__ . '/../models/OutdoorModel.php';

class OutdoordRepository implements IOutdoorRepository{
    //put your code here
     private $db;

    public function __construct() {
        $this->db = DbConnection::getInstance();
    }
    
    public function delete($id, $estado){
        try {
            $stmt = $this->db->prepare("UPDATE `outdoor` SET `eliminado`=:estado WHERE id =:id");
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":estado", $estado);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function insert($tipo, $preco, $idComuna, $idGestor) {
        try {
            $stmt = $this->db->prepare("INSERT INTO `outdoor`(`tipo`, `preco`, `idComuna`, `idUsuario`)"
                    . "VALUES (:tipo,:preco, :idComuna,:idUsuario)");
            $stmt->bindParam(":tipo", $tipo);
            $stmt->bindParam(":preco", $preco);
            $stmt->bindValue(':idComuna', $idComuna);
            $stmt->bindParam(":idUsuario", $idGestor);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function update($id, $tipo, $preco, $comuna,$idGestor)
    {
        try {
            $stmt = $this->db->prepare("UPDATE `outdoor` SET tipo=:tipo, preco=:preco,idComuna=:idComuna,idUsuario=:idUsuario  WHERE id = :id");
            $stmt->bindParam(":tipo", $tipo);
            $stmt->bindParam(":preco", $preco);
            $stmt->bindValue(':idComuna', $comuna);
            $stmt->bindParam(":idUsuario", $idGestor);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function updateEstado($id,$estado)
    {
        try {
            $stmt = $this->db->prepare("UPDATE `outdoor` SET estado=:estado  WHERE id = :id");
            $stmt->bindParam(":estado", $estado);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function selectCount() {
        try {
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM `outdoor` WHERE eliminado <> 'Sim'");
            $stmt->execute();
            $adm = $stmt->fetchColumn();
            return $adm;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function selectByIdPedido($id) {
        try {
            $stmt = $this->db->prepare("SELECT o.id FROM `outdoor` o join pedidos p on p.idOutdoor = o.id WHERE o.eliminado <> 'Sim' and p.estado <> 'terminado' and p.id = :id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $adm = $stmt->fetchColumn();
            return $adm;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function selectAll() {
        try {
            $stmt = $this->db->prepare("SELECT o.id, o.tipo, `preco`,c.nome `idComuna`, `estado`, o.eliminado, u.username `idUsuario`  FROM outdoor o join usuario u  on u.id = o.idUsuario join comuna c on c.id = o.idComuna WHERE o.eliminado <> 'Sim'");
            $stmt->execute();
            $outdoors = $stmt->fetchAll();
            $listaOutdoor = array();
            foreach ($outdoors as $cada) { // Itere sobre os resultados
                $listaOutdoor[] = new OutdoorModel($cada['id'], $cada['tipo'], $cada['preco'],$cada['idComuna'], $cada['estado'], $cada['eliminado'], $cada['idUsuario']);
            }
            return $listaOutdoor;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }  
}
