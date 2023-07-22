<?php

/**
 * Description of ClienteModel
 *
 * @author Milton Dantas
 */
require_once __DIR__ . '/../repositories/ClienteRepository.php';
require_once __DIR__ . '/./IClienteService.php';

class ClienteService implements IClienteService {

    private $clienteRepository = NULL;

    public function __construct() {
        $this->clienteRepository = new ClienteRepository();
    }

    public function insertCliente($nomeCompleto, $tipoCliente, $actividadeEmpresa, $comuna, $nacionalidade, $morada, $email, $telemovel, $idUsuario) {
        try {
            if ($this->clienteRepository->insertCliente($nomeCompleto, $tipoCliente, $actividadeEmpresa, $comuna, $nacionalidade, $morada, $email, $telemovel, $idUsuario)) {
                mail('adrianonovo33@gmail.com', 'Cadastro de novo Usuário', 'O Usuario: precisa de verificação!', 'From: ' . $email);
                return true;
            } else
                return false;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function alterarUtilizador($id, $nomeCompleto, $comuna, $nacionalidade, $morada, $email, $telemovel) {
        try {
            return $this->clienteRepository->alterarUtilizador($id, $nomeCompleto, $comuna, $nacionalidade, $morada, $email, $telemovel);
        } catch (Exception $e) {
            return false;
        }
    }

    public function bloquearCliente($id) {
        try {
            return $this->clienteRepository->setEstado("bloqueado", $id);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function desbloquearCliente($id) {
        try {
            return $this->clienteRepository->setEstado("ativo", $id);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function ativarCliente($id) {
        try {
            return $this->clienteRepository->setEstado("ativo", $id);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function showClientes() {
        try {
            return $this->clienteRepository->selectAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getTotalClientes() {
        return $this->clienteRepository->selectCount();
    }

    public function selectByIdUsuario($id) {
        return $this->clienteRepository->selectByIdUsuario($id);
    }

    public function selectById($id) {
        return $this->clienteRepository->selectById($id);
    }

}
