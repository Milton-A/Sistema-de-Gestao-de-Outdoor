<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of SolicitacaoRepository
 *
 * @author Milton Dantas
 */
require_once __DIR__ . '/./ISolicitacaoRepository.php';
require_once __DIR__ . '/../models/SolicitacaoModel.php';
require_once __DIR__ . '/../dbconfig/DbConnection.php';

class SolicitacaoRepository implements ISolicitacaoRepository {

    //put your code here
    private $db;

    public function __construct() {
        $this->db = DbConnection::getInstance();
    }

    public function selectCount() {
        try {
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM `pedidos`");
            $stmt->execute();
            $adm = $stmt->fetchColumn();
            return $adm;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function selectGestorPedidos() {
        try {
            $stmt = $this->db->prepare("SELECT idGestor, COUNT(*) AS num_pedidos FROM pedidos GROUP BY idGestor ORDER BY num_pedidos LIMIT 1;");
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result['num_pedidos'] === 1) {
                return $result['idGestor'];
            } else {
                return true;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function selectAll() {
        try {
            $stmt = $this->db->prepare("SELECT p.id, u.username `gestor`, `imagem`, `dataInicio`, `dataFim`, `total`, o.tipo `idOutdoor`, p.eliminado, p.estado as estadoPedido, o.estado estadoOutdoor, `recibo` FROM pedidos p join usuario u on u.id = p.idGestor join outdoor o on o.id = p.idOutdoor");
            $stmt->execute();
            $outdoors = $stmt->fetchAll();
            $listaOutdoor = array();
            foreach ($outdoors as $cada) {
                $listaOutdoor[] = new SolicitacaoModel($cada['id'], $cada['gestor'], $cada['imagem'], $cada['dataInicio'], $cada['dataFim'], $cada['total'], $cada['idOutdoor'], $cada['eliminado'], $cada['estadoPedido'], $cada['estadoOutdoor'], $cada['recibo']);
            }
            return $listaOutdoor;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function selectAllEmEspera() {
        try {
            $stmt = $this->db->prepare("SELECT o.id, o.tipo, `preco`, `idComuna`, `estado`, o.eliminado, u.username `idUsuario`  FROM outdoor o join usuario u  on u.id = o.idUsuario join comuna c on c.id = o.idComuna where p.eliminado <> 'sim' and o.estado = 'A aguardar pagamento'");
            $stmt->execute();
            $outdoors = $stmt->fetchAll();
            $listaOutdoor = array();
            foreach ($outdoors as $cada) {
                $listaOutdoor[] = new SolicitacaoModel($cada['id'], $cada['idCliente'], $cada['imagem'], $cada['dataInicio'], $cada['dataFim'], $cada['total'], $cada['tipo'], $cada['preco'], $cada['comuna'], $cada['p']);
            }
            return $listaOutdoor;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function aprovar($estado, $id) {
        try {
            $stmt = $this->db->prepare("UPDATE `pedidos` SET `estado`= :estado WHERE id =:id");
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":estado", $estado);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function insert($idGestor, $idCliente, $imagem, $dataInicio, $dataFim, $totalPagar, $idOutdoor, $recibo) {
        try {
            $stmt = $this->db->prepare("INSERT INTO `pedidos`(`idGestor`, `idCliente`, `imagem`, `dataInicio`, `dataFim`, `total`, `idOutdoor`, `recibo`) "
                    . "VALUES (:idGestor,:idCliente,:imagem, :dataInicio,:dataFim,:total,:idOutdoor, :recibo)");
            $stmt->bindParam(":idGestor", $idGestor);
            $stmt->bindParam(":idCliente", $idCliente);
            $stmt->bindParam(":imagem", $imagem);
            $stmt->bindParam(":dataInicio", $dataInicio);
            $stmt->bindParam(":dataFim", $dataFim);
            $stmt->bindParam(":total", $totalPagar);
            $stmt->bindParam(":idOutdoor", $idOutdoor);
            $stmt->bindParam(":recibo", $recibo);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function update($idSolicitacao, $idGestor) {
        try {
            $stmt = $this->db->prepare("UPDATE `pedidos` SET `idGestor`= :idGestor WHERE id =:id");
            $stmt->bindParam(":id", $idSolicitacao);
            $stmt->bindParam(":idGestor", $idGestor);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function validarRecibo($idSolicitacao) {
        try {
            $stmt = $this->db->prepare("SELECT recibo FROM pedidos WHERE id = :id");
            $stmt->bindParam(":id", $idSolicitacao);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $recibo = $result['recibo'];

                header('Content-Type: application/pdf');
                header('Content-Disposition: attachment; filename="recibo.pdf"');

                echo $recibo;
                exit();
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function carregarRecibo($idSolicitacao, $recibo) {
        try {
            $stmt = $this->db->prepare("UPDATE `pedidos` SET `recibo`= :recibo WHERE id =:id");
            $stmt->bindParam(":id", $idSolicitacao);
            $stmt->bindParam(":recibo", $recibo);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

}
