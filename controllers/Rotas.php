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
                $this->gestorController->requesHandler();
            } else if ($action === 'Administrador') {
                $this->administradorController->requesHandler();
            } else if ($action === 'logout') {
                $this->showLogOut();
            } else if ($op == 'Cliente') {
                $this->clienteController->requesHandler();
            } else if ($op == 'Usuario') {
                $this->usuarioController->requesHandler();
            } else if ($op == 'addOutdoor') {
                $this->addCarrinho();
            } else if ($op == 'novoId') {
                $this->recebeId();
            } else {
                $this->showHome();
            }
        } catch (Exception $e) {
            $this->showError("Application error", $e->getMessage());
        }
    }

    public function recebeId() {
        if (isset($_POST['idPedidoOutdoor']))
            echo $_POST['idPedidoOutdoor'];
    }

    public function addCarrinho() {
        if (isset($_POST['id'])) {
            $codOutdoor = $_POST['id'];
            $imagem = $_FILES['imagem'];
            $caminho_final = "";
            $nome_imagem = uniqid() . "_" . $imagem["name"];
            if (move_uploaded_file($imagem["tmp_name"], "C:/xampp/htdocs/gestOutdoor/content/images/" . $nome_imagem)) {
                $caminho_final = "http://localhost/gestOutdoor/content/images/" . $nome_imagem;
            } else {
                return "Ocorreu um erro ao mover o arquivo.";
            }

            $dataInicio = isset($_POST['dataInicio']) ? filter_input(INPUT_POST, 'dataInicio') : NULL;
            $dataFim = isset($_POST['dataFim']) ? filter_input(INPUT_POST, 'dataFim') : NULL;
            $comprovativo = $_FILES['recibo'];
            $preco = isset($_POST['preco']) ? filter_input(INPUT_POST, 'preco') : NULL;

            $caminho_finalComprovativo = "";
            $nome_imagem = uniqid() . "_" . $comprovativo["name"];
            if (move_uploaded_file($comprovativo["tmp_name"], "C:/xampp/htdocs/gestOutdoor/content/comprovativo/" . $nome_imagem)) {
                $caminho_finalComprovativo = "http://localhost/gestOutdoor/content/comprovativo/" . $nome_imagem;
            } else {
                return "Ocorreu um erro ao mover o arquivo.";
            }
            $confirmar = 0;

            $_SESSION['carrinho'][$codOutdoor] = array(
                'codOutdoor' => $codOutdoor,
                'imagem' => $caminho_final,
                'dataInicio' => $dataInicio,
                'dataFim' => $dataFim,
                'recibo' => $caminho_finalComprovativo,
                'confirmar' => $confirmar,
                'preco' => $preco
            );
        }
        //echo json_encode($_SESSION['carrinho'][$codOutdoor]);
    }

    function showLogOut() {
        session_destroy();
        $this->redirect('index.php');
    }

    function showHome() {
        if (isset($_POST['inserirLista'])) {
            $this->clienteController->solicitarAluguer();
        }
        if (isset($_POST['inserirRecibo'])) {
            $this->clienteController->solicitarAluguer();
        }
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
