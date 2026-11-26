<?php
require_once __DIR__ . '/../models/Cliente.php';

class ClienteController {
    private $model;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: index.php?controller=Login&action=index');
            exit;
        }
        $this->model = new Cliente();
    }

    private function dadosDoFormulario() {
        return [
            'nome'        => trim($_POST['nome']),
            'telefone'    => trim($_POST['telefone']),
            'email'       => trim($_POST['email']),
            'pet_nome'    => trim($_POST['pet_nome']),
            'pet_especie' => trim($_POST['pet_especie']),
            'pet_raca'    => trim($_POST['pet_raca'])
        ];
    }

    public function index() {
        $clientes = $this->model->all();
        require_once __DIR__ . '/../views/clientes/index.php';
    }

    public function cadastrar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $this->model->insert($this->dadosDoFormulario());
                header('Location: index.php?controller=cliente&action=index');
                exit;
            } catch (PDOException $e) {
                $erro = 'Não foi possível cadastrar o cliente.';
            }
        }
        require_once __DIR__ . '/../views/clientes/cadastrar.php';
    }

    public function editar() {
        $id = $_GET['id'] ?? null;
        if (!$id) die("ID não fornecido.");

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $this->model->update($id, $this->dadosDoFormulario());
                header('Location: index.php?controller=cliente&action=index');
                exit;
            } catch (PDOException $e) {
                $erro = 'Não foi possível salvar as alterações.';
            }
        }

        $cliente = $this->model->find($id);
        if (!$cliente) {
            header('Location: index.php?controller=cliente&action=index');
            exit;
        }
        require_once __DIR__ . '/../views/clientes/editar.php';
    }

    public function excluir() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->model->delete($id);
        }
        header('Location: index.php?controller=cliente&action=index');
        exit;
    }
}

?>
