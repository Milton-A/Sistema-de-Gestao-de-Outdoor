<?php
/**
 * Description of GestorController
 *
 * @author Milton Dantas
 */
require_once __DIR__ . '/../services/GestorService.php';
require_once __DIR__ . '/../services/UsuarioService.php';
require_once __DIR__ . '/../services/OutdoorService.php';
require_once __DIR__ . '/../services/SolicitacaoService.php';

class GestorController {

    //put your code here
    private $gestorService = NULL;
    private $solicitacaoService = null;
    private $usuarioService = null;
    private $outdoorService = null;
    private $gestor = null;

    public function __construct() {
        $this->gestorService = new GestorService();
        $this->outdoorService = new OutdoorService();
        $this->usuarioService = new UsuarioService();
        $this->solicitacaoService = new SolicitacaoService();

        if (isset($_SESSION['Cliente']))
            $this->gestor = unserialize($_SESSION['Cliente']);
    }

    public function requesHandler() {
        $op = filter_input(INPUT_GET, 'request');
        $action = isset($op) ? $op : NULL;

        try {
            if ($action === 'verPedidos') {
                $this->showGestorPagePedidos();
            } else if ($action === 'addOutdoor') {
                $this->showGestorPageAddOutdoor();
            } else if ($action === 'alterarGestor') {
                $this->showGestorAlterar();
            } else {
                if ($this->gestor->getEstado() === "off") {
                    $this->showGestorAlterar();
                } else {
                    $this->showGestorPage();
                }
            }
        } catch (Exception $e) {
            // some unknown Exception got through here, use application error page to display it
            $this->showError("Application error", $e->getMessage());
        }
    }

    public function showGestorPage() {
        include __DIR__ . '/../views/gestor/gestorView.php';
    }

    public function showGestorPagePedidos() {
        $opPdf = filter_input(INPUT_POST, 'pdf');
        $pdf = isset($opPdf) ? $opPdf : NULL;
        include __DIR__ . '/../views/gestor/gestorViewPedidos.php';
    }

    public function showGestorPageAddOutdoor() {
        if (isset($_SESSION['Usuario']))
            $usuario = unserialize($_SESSION['Usuario']);
        include __DIR__ . '/../views/gestor/gestorViewCriar.php';
        if (isset($_POST['form-register-outdoor']) && $_POST['form-register-outdoor'] > 0) {
            $idGestor = $usuario->getId();
            $id = $_POST['form-register-outdoor'];
            $preco = $_POST['preco'];
            $tipo_outdoor = $_POST['tipo_outdoor'];
            $comuna = $_POST['Comuna'];
            try {
                if ($this->outdoorService->update($id, $tipo_outdoor, $preco, $comuna, $idGestor)) {
                    echo "<script>alert('Outdoor Alterado!');</script>";
                } else {
                    echo "<script>alert('Outdoor não Alterado $id, $tipo_outdoor, $preco, $comuna, $idGestor!');</script>";
                }
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        } else if (isset($_POST['form-register-outdoor']) && $_POST['form-register-outdoor'] == 0) {
            $idGestor = $_SESSION['id'];
            $preco = $_POST['preco'];
            $tipo_outdoor = $_POST['tipo_outdoor'];
            $comuna = $_POST['Comuna'];
            try {
                $this->gestorController->inserirOutdoor($tipo_outdoor, $comuna, $imagem, "Livre", $preco, $idGestor, "Nao");
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }
    }

    public function showGestorAlterar() {
        if (isset($_SESSION['Usuario']))
            $usuario = unserialize($_SESSION['Usuario']);
        if (isset($_POST['form-alterarD'])) {
            $username = $_POST['username'];
            $senha = $_POST['password'];
            try {
                $this->usuarioService->alterarUsuario($usuario->getId(), $username, $senha);
                $this->gestorService->alterarEstado($usuario->getId());

                $Cliente = $this->gestorService->selectByIdUsuario($usuario->getId());
                $_SESSION['Cliente'] = serialize($Cliente);
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
            $this->redirect('index.php?op=Gestor');
        }
        include __DIR__ . '/../views/gestor/gestorAlterarDados.php';
    }

    public function verOutdoors() {
        $estado = filter_input(INPUT_GET, 'estado');
        $action2 = isset($estado) ? $estado : NULL;
        $outdoors = $this->outdoorService->selectAll();
        include __DIR__ . '/../views/gestor/tabela.php';
    }

    public function verPedidosOutdoors() {
        $estado = filter_input(INPUT_GET, 'estado');
        $action2 = isset($estado) ? $estado : NULL;
        $outdoors = $this->solicitacaoService->selectAll();
        include __DIR__ . '/../views/gestor/tabelaPedidos.php';
    }

    public function totalOutdoors() {
        return $this->outdoorService->selectCount();
    }

    function redirect($location) {
        header('Location: ' . $location);
    }
}