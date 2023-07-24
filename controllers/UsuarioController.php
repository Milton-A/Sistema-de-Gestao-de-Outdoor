<?php

/**
 * Description of Usuario
 *
 * @author Milton Dantas
 */
require_once __DIR__ . '/../services/UsuarioService.php';
require_once __DIR__ . '/../services/ClienteService.php';
require_once __DIR__ . '/../services/GestorService.php';
require_once __DIR__ . '/../services/AdministradorService.php';

class UsuarioController {

    //put your code here

    private $usuarioService = null;
    private $clienteService = null;
    private $gestorService = null;
    private $administradorService = null;

    public function __construct() {
        $this->usuarioService = new UsuarioService();
        $this->clienteService = new ClienteService();
        $this->administradorService = new AdministradorService();
        $this->gestorService = new GestorService();
    }

    public function requesHandler() {
        $op = filter_input(INPUT_GET, 'request');
        $action = isset($op) ? $op : NULL;
        try {
            if ($action === 'login') {
                $this->login();
            } else if ($action === 'alterarUsuario') {
                $this->alterarUsuario();
            } else if ($action === 'eliminar') {
                $this->eliminar();
            } else {
                $this->redirect("index.php");
            }
        } catch (Exception $e) {
            $this->showError("Application error", $e->getMessage());
        }
    }

    public function login() {
        if (isset($_POST['form-login-submitted'])) {
            $username = filter_input(INPUT_POST, 'username');
            $senha = filter_input(INPUT_POST, 'senha');
            if (empty($username) || empty($senha)) {
                echo "<script>alert('Por favor, preencha todos os campos!');</script>";
            } else {
                $usuario = $this->usuarioService->login($username, $senha);

                if ($usuario != false) {

                    $_SESSION['loggedin'] = true;
                    $_SESSION['Usuario'] = serialize($usuario);

                    if ($usuario->getTipo() == 'Cliente') {
                        
                        $Cliente = $this->clienteService->selectByIdUsuario($usuario->getId());
                        $_SESSION['Cliente'] = serialize($Cliente);
                        $this->redirect('index.php?op=Cliente');
                        
                    } else if ($usuario->getTipo() == 'Gestor') {
                        
                        $Cliente = $this->gestorService->selectByIdUsuario($usuario->getId());
                        $_SESSION['Cliente'] = serialize($Cliente);
                        
                        if ($this->gestorService->isFirstLogin($Cliente->getId()))
                            $this->redirect('index.php?op=Gestor&&request=firstLogin');
                        else
                            $this->redirect('index.php?op=Gestor&&estado=all');
                        
                    } else if ($usuario->getTipo() == "Administrador") {
                        
                        $Cliente = $this->administradorService->selectByIdUsuario($usuario->getId());
                        $_SESSION['Cliente'] = serialize($Cliente);
                        $this->redirect('index.php?op=Administrador');
                        
                    }
                } else {
                    echo "<script>alert('Username ou Senha incorreta!');</script>";
                }
            }
        }
        include __DIR__ . '/../views/login/loginView.php';
    }

    function redirect($location) {
        header('Location: ' . $location);
    }

    public function alterarUsuario() {
        if (isset($_POST['form-alterar-submitted'])) {
            
        } else
            $this->usuarioService->alterarUsuario($id, $username, $tipo, $senha);
    }

    public function eliminar() {
        if (isset($_POST['form-eliminar-submitted'])) {
            
        } else
            $this->usuarioService->eliminarUsuario($id);
    }

}
