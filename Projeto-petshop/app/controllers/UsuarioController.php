<?php
require_once __DIR__ . '/../models/Usuario.php';

class UsuarioController {
    private $model;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: index.php?controller=Login&action=index');
            exit;
        }
        $this->model = new Usuario();
    }

    public function index() {
        $usuarios = $this->model->all();
        require_once __DIR__ . '/../views/usuarios/index.php';
    }

    public function cadastrar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'nome'   => $_POST['nome'],
                'login'  => $_POST['login'],
                'senha'  => password_hash($_POST['senha'], PASSWORD_DEFAULT),
                'perfil' => $_POST['perfil']
            ];
            try {
                $this->model->insert($dados);
                header('Location: index.php?controller=usuario&action=index');
                exit;
            } catch (PDOException $e) {
                $erro = ($e->getCode() == 23000)
                    ? 'Esse login já está em uso. Escolha outro.'
                    : 'Não foi possível cadastrar o usuário.';
            }
        }
        require_once __DIR__ . '/../views/usuarios/cadastrar.php';
    }

    public function editar() {
        $id = $_GET['id'] ?? null;
        if (!$id) die("ID não fornecido.");

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'nome'   => $_POST['nome'],
                'login'  => $_POST['login'],
                'perfil' => $_POST['perfil']
            ];
            if (!empty($_POST['senha'])) {
                $dados['senha'] = password_hash($_POST['senha'], PASSWORD_DEFAULT);
            }
            try {
                $this->model->update($id, $dados);
                header('Location: index.php?controller=usuario&action=index');
                exit;
            } catch (PDOException $e) {
                $erro = ($e->getCode() == 23000)
                    ? 'Esse login já está em uso. Escolha outro.'
                    : 'Não foi possível salvar as alterações.';
            }
        }

        $usuario = $this->model->find($id);
        if (!$usuario) {
            header('Location: index.php?controller=usuario&action=index');
            exit;
        }
        require_once __DIR__ . '/../views/usuarios/editar.php';
    }

    public function excluir() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->model->delete($id);
        }
        header('Location: index.php?controller=usuario&action=index');
        exit;
    }
}

?>
