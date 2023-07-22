<?php

/**
 * Description of rotas
 *
 * @author Milton Dantas
 */
require_once __DIR__ . '/./AdministradorController.php';
require_once __DIR__ . '/./ClienteController.php';
require_once __DIR__ . '/./ComunaController.php';
require_once __DIR__ . '/./GestorController.php';
require_once __DIR__ . '/./MunicipioController.php';
require_once __DIR__ . '/./OutdoorController.php';
require_once __DIR__ . '/./ProvinciaController.php';
require_once __DIR__ . '/./SolicitacaoController.php';
require_once __DIR__ . '/./UsuarioController.php';

class Rotas {

    //put your code here
    private $administradorController = null;
    private $clienteController = null;
    private $comunaController = null;
    private $gestorController = null;
    private $municipioController = null;
    private $OutdoorController = null;
    private $provinciaController = null;
    private $solicitacaoController = null;
    private $usuarioController = null;

    public function __construct() {
        $this->OutdoorController = new OutdoorController();
        $this->administradorController = new AdministradorController();
        $this->clienteController = new ClienteController();
        $this->comunaController = new ComunaController();
        $this->gestorController = new GestorController();
        $this->municipioController = new MunicipioController();
        $this->provinciaController = new ProvinciaController();
        $this->solicitacaoController = new SolicitacaoController();
        $this->usuarioController = new UsuarioController();
    }

    public function requestHandle() {
        $op = filter_input(INPUT_GET, 'op');
        $action = isset($op) ? $op : NULL;
        try {
            if ($action === 'login') {
                $this->usuarioController->requesHandler();
            } else if ($action === 'Gestor') {
                $this->gestorController->requestHandler();
            } else if ($action === 'Administrador') {
                $this->administradorController->requesHandler();
            } else if ($action === 'logout') {
                $this->showLogOut();
            } else if ($op == 'Cliente') {
                $this->clienteController->requesHandler();
            } else if ($op == 'Usuario') {
                $this->usuarioController->requesHandler();
            } else {
                $this->showHome();
            }
        } catch (Exception $e) {
            $this->showError("Application error", $e->getMessage());
        }
    }

    function showLogOut() {
        session_destroy();
        $this->redirect('index.php');
    }

    function showHome() {
        include __DIR__ . '/../views/home.php';
    }

    function showAdmPage() {
        include __DIR__ . '/../views/administrador/administradorView.php';
    }

    function showGestorPage() {
        include __DIR__ . '/../views/gestor/gestorView.php';
    }

    function showGestorPagePedidos() {
        include __DIR__ . '/../views/gestor/gestorViewPedidos.php';
    }

    function showAdmPageOutdoors() {
        include __DIR__ . '/../views/administrador/administradorViewOutdoors.php';
    }

    function showAdmPageGestor() {
        include __DIR__ . '/../views/administrador/administradorViewGestor.php';
    }
    function redirect($location) {
        header('Location: ' . $location);
    }

}
