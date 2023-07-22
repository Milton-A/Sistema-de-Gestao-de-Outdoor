<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of AdministradorController
 *
 * @author Milton Dantas
 */
require_once __DIR__ . '/../services/AdministradorService.php';
require_once __DIR__ . '/../services/GestorService.php';
require_once __DIR__ . '/../services/ClienteService.php';
require_once __DIR__ . '/../services/OutdoorService.php';
require_once __DIR__ . '/../services/SolicitacaoService.php';

class AdministradorController {

    //put your code here
    private $admService = NULL;
    private $gestorService = null;
    private $clienteService = null;
    private $outdoorService = null;
    private $solicitacoesService = null;

    public function __construct() {
        $this->admService = new AdministradorService();
        $this->gestorService = new GestorService();
        $this->clienteService = new ClienteService();
        $this->outdoorService = new OutdoorService();
        $this->solicitacoesService = new SolicitacaoService();
    }

    public function requesHandler() {
        $op = filter_input(INPUT_GET, 'request');
        $action = isset($op) ? $op : NULL;

        try {
            if ($action === 'addGestor') {
                $this->showCadastrarGestorPage();
            } else if ($action === 'verGestores') {
                $this->showGestoresPage();
            } else if ($action === 'verOutdoors') {
                $this->showOutdoorPage();
            } else if ($action === 'verSolicitacoes') {
                $this->showSolicitacoesPage();
            } else {
                $this->showAdmPage();
            }
        } catch (Exception $e) {
            // some unknown Exception got through here, use application error page to display it
            $this->showError("Application error", $e->getMessage());
        }
    }

    public function verClientes() {
        $clientes = $this->clienteService->showClientes();
        include __DIR__ . '/../views/tabelas/cliente.php';
    }

    public function verGestores() {
        $gestores = $this->gestorService->verGestores();
        include __DIR__ . '/../views/tabelas/gestor.php';
    }

    public function verOutdoors() {
        $estado = filter_input(INPUT_GET, 'estado');
        $action2 = isset($estado) ? $estado : NULL;
        $outdoors = $this->outdoorService->selectAll();
        include __DIR__ . '/../views/tabelas/outdoors.php';
    }

    public function verOutdoorsPedidos() {
        $outdoors = $this->solicitacoesService->selectAll();
        include __DIR__ . '/../views/tabelas/outdoorsSolicitacoes.php';
    }

    public function showCadastrarGestorPage() {
         if (filter_input(INPUT_POST, 'form-criarGestor-submitted') !== null) {
            $username = filter_input(INPUT_POST, 'userName');
            $senha = filter_input(INPUT_POST, 'senha');
            $tipo = "Cliente";
            $nomeCompleto = filter_input(INPUT_POST, 'nome');
            $comuna = filter_input(INPUT_POST, 'Comuna');
            $nacionalidade = filter_input(INPUT_POST, 'nacionalidade');
            $morada = filter_input(INPUT_POST, 'morada');
            $email = filter_input(INPUT_POST, 'email');
            $telemovel = filter_input(INPUT_POST, 'telefone');

            if ($username == null || $senha == null || $tipoCliente == null || $nomeCompleto == null || $comuna == null || $nacionalidade == null || $morada == null || $email == null) {
                echo "<script>alert('Por favor, preencha todos os campos!');</script>";
            } else {
                $response = false;
                $idUsuario = $this->usuarioService->criarUsuario($username, $tipo, $senha);

                if ($idUsuario) {
                    $response = $this->gestorService->inserirGestor($nomeCompleto, $email, $comuna, $morada, $telemovel, $idUsuario, $idAdm);
                    if ($response) {
                        echo "<script>alert('Registrado com Sucesso!');</script>";
                    } else {
                        echo "<script>alert('[Falha] Não Registrado!');</script>";
                    }
                } else {
                    echo "<script>alert('[Falha] Username Já existe!');</script>";
                }
            }
        }
        include __DIR__ . '/../views/registro/registroView.php';
    }

    public function showAdmPage() {
        include __DIR__ . '/../views/administrador/administradorView.php';
    }

    public function showGestoresPage() {
        include __DIR__ . '/../views/administrador/administradorViewGestor.php';
    }

    public function showOutdoorPage() {
        include __DIR__ . '/../views/administrador/administradorViewOutdoors.php';
    }

    public function showSolicitacoesPage() {
        include __DIR__ . '/../views/administrador/administradorViewOutdoorsPedidos.php';
    }

    public function verTotalOutdoors() {
        return $this->outdoorService->selectCount();
    }

    public function verTotalClientes() {
        return $this->clienteService->getTotalClientes();
    }

    public function verTotalGestores() {
        return $this->gestorService->getTotal();
    }

    public function verTotalAdministradores() {
        return $this->admService->selectCount();
    }

    public function ativarContas() {
        
    }

    public function bloquearContas() {
        
    }

    public function alterarEmail() {
        
    }

    public function alterarGestorSolicitacao() {
        
    }

}
