<?php

/**
 * Description of UsuarioService
 *
 * @author Milton Dantas
 */
require_once __DIR__ . '/./IUsuarioService.php';
require_once __DIR__ . '/../repositories/UsuarioRepository.php';

class UsuarioService implements IUsuarioService {

    private $usuarioRepository = null;

    public function __construct() {
        $this->usuarioRepository = new UsuarioRepository();
    }

    public function alterarUsuario($id, $username,$senha) {
        if (!$this->isUsernameExist($username)) {
            return $this->usuarioRepository->update($id, $username, $senha);
        }
        return false;
    }

    public function criarUsuario($username, $tipo, $senha) {
        try {
            if (!$this->isUsernameExist($username))
                return $this->usuarioRepository->insert($username, $senha, $tipo);
            return false;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function eliminarUsuario($id) {
        try {
            return $this->usuarioRepository->delete($id, "sim");
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function isUsernameExist($username) {
        return $this->usuarioRepository->isUsername($username);
    }

    public function login($username, $senha) {
        try {
            return $this->usuarioRepository->login($username, $senha);
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public function selectById($id) {
        try {
            return $this->usuarioRepository->selectById($id);
        } catch (PDOException $e) {
            return false;
        }
    }

}
