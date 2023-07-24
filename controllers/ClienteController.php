<?php

/**
 * Description of ClienteModel
 *
 * @author Milton Dantas
 */
require_once __DIR__ . '/../services/ClienteService.php';
require_once __DIR__ . '/../services/UsuarioService.php';
require_once __DIR__ . '/../services/SolicitacaoService.php';
require_once __DIR__ . '/../services/OutdoorService.php';

class ClienteController {

    private $clienteService = NULL;
    private $solicitacaoService = null;
    private $usuarioService = null;
    private $outdoorService = null;

    public function __construct() {
        $this->clienteService = new ClienteService();
        $this->usuarioService = new UsuarioService();
        $this->solicitacaoService = new SolicitacaoService();
        $this->outdoorService = new OutdoorService();
        if (isset($_SESSION['Usuario'])) {
            $Us = unserialize($_SESSION['Usuario']);
            $_SESSION['Usuario'] = serialize($this->usuarioService->selectById($Us->getId()));
        }
        if (isset($_POST['action']) && $_POST['action'] === 'ativarcliente' && isset($_POST['idCliente'])) {
            $idCliente = $_POST['idCliente'];
            $this->clienteService->ativarCliente($idCliente);
        }
        if (isset($_POST['action']) && $_POST['action'] === 'bloquear' && isset($_POST['idCliente'])) {
            $idCliente = $_POST['idCliente'];
            $this->clienteService->bloquearCliente($idCliente);
        }
        if (isset($_POST['action']) && $_POST['action'] === 'desbloquear' && isset($_POST['idCliente'])) {
            $idCliente = $_POST['idCliente'];
            $this->clienteService->desbloquearCliente($idCliente);
        }
    }

    public function verCarrinho() {
        include __DIR__ . '/../views/cart.php';
    }

    public function requesHandler() {
        $op = filter_input(INPUT_GET, 'request');
        $action = isset($op) ? $op : NULL;
        try {
            if ($action === 'registro') {
                $this->criarCliente();
            } else if ($action === 'alterarDados') {
                $this->alterarCliente();
            } else if ($action === 'solicitar') {
                
            } else {
                $this->redirect("index.php");
            }
        } catch (Exception $e) {
            $this->showError("Application error", $e->getMessage());
        }
    }

    function redirect($location) {
        header('Location: ' . $location);
    }

    public function criarCliente() {

        if (filter_input(INPUT_POST, 'form-criar-submitted') !== null) {
            $username = filter_input(INPUT_POST, 'userName');
            $senha = filter_input(INPUT_POST, 'senha');
            $tipo = "Cliente";
            $nomeCompleto = filter_input(INPUT_POST, 'nome');
            $tipoCliente = filter_input(INPUT_POST, 'tipoCliente');
            $actividadeEmpresa = filter_input(INPUT_POST, 'atividadeEmpresa');
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
                    $response = $this->clienteService->insertCliente($nomeCompleto, $tipoCliente, $actividadeEmpresa, $comuna, $nacionalidade, $morada, $email, $telemovel, $idUsuario);

                    if ($response) {
                        echo "<script>alert('Registrado com Sucesso!');</script>";
                        $this->redirect("index.php?op=login");
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

    public function alterarCliente() {
        if (isset($_SESSION['Cliente'])) {
            $Cliente = unserialize($_SESSION['Cliente']);
        }
        if (isset($_SESSION['Usuario'])) {
            $Usuario = unserialize($_SESSION['Usuario']);
        }
        if (filter_input(INPUT_POST, 'form-alterar-submitted') !== null) {
            $username = filter_input(INPUT_POST, 'userName');
            $senha = filter_input(INPUT_POST, 'senha');
            $nomeCompleto = filter_input(INPUT_POST, 'nome');
            $comuna = filter_input(INPUT_POST, 'Comuna');
            $nacionalidade = filter_input(INPUT_POST, 'nacionalidade');
            $morada = filter_input(INPUT_POST, 'morada');
            $email = filter_input(INPUT_POST, 'email');
            $telemovel = filter_input(INPUT_POST, 'telefone');

            $retorno = $this->usuarioService->alterarUsuario($Usuario->getId(), $username, $senha);
            $_SESSION['Usuario'] = serialize($this->usuarioService->selectById($Usuario->getId()));

            if ($retorno) {
                $response = $this->clienteService->alterarUtilizador($Cliente->getId(), $nomeCompleto, $comuna, $nacionalidade, $morada, $email, $telemovel);
                if ($response) {
                    echo "<script>alert('Dados Alterados!" . $Cliente->getId() . "');</script>";
                    $_SESSION['Cliente'] = serialize($this->clienteService->selectById($Cliente->getId()));
                    $this->redirect("index.php");
                } else {
                    echo "<script>alert('Cliente Não Registrado!" . $Cliente->getId() . "');</script>";
                }
            } else {
                echo "<script>alert('[Falha] Username Já existe!  $username');</script>";
            }
        }
        include __DIR__ . '/../views/registro/registroView.php';
    }

    public function solicitarAluguer() {
        if (isset($_SESSION['Usuario'])) {
            $Usuario = unserialize($_SESSION['Usuario']);
        }
        if (isset($_SESSION['carrinho'])) {
            foreach ($_SESSION['carrinho'] as $key => $value) {

                $imagem = (string) $value['imagem'];
                $preco = $value['preco'];

                $dataInicio = $value['dataInicio'];
                $dataFim = $value['dataFim'];
                $dataInicioObj = new DateTime($dataInicio);
                $dataFimObj = new DateTime($dataFim);

                $dataAtualObj = new DateTime();
                $intervalo = $dataInicioObj->diff($dataFimObj);
                $totalDias = $intervalo->days;
                $totalPagar = $totalDias * $preco;

                $recibo = $value['recibo'];
                $confirmar = 0;
                $outdoor = $value['codOutdoor'];
                
                if ($recibo == null) {
                    $this->outdoorService->alterarEstado($outdoor, "A aguardar pagamento");
                } else {
                    $this->outdoorService->alterarEstado($outdoor, "Por Validar Pamento");
                }
                $idGestor = $this->solicitacaoService->selectGestorPedidos();
                $this->solicitacaoService->insert($idGestor, $Usuario->getId(), $imagem, $dataInicio, $dataInicio, $totalPagar, $outdoor, $recibo);
                unset($_SESSION['carrinho']);
                $this->redirect("index.php");
            }
        }
    }

    public function carregarComprovativo() {
        $this->solicitacaoService->carregarRecibo($idSolicitacao, $recibo);
    }

    public function consultarSolicitacoes($idCliente) {
        return $this->clienteService->consultarSolicitacoes($idCliente);
    }

}

$actualizar = new ClienteController();
