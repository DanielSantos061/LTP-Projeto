<?php
require_once __DIR__ . '/../models/Produto.php';

class ProdutoController {
    private $model;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: index.php?controller=Login&action=index');
            exit;
        }
        $this->model = new Produto();
    }

    private function dadosDoFormulario() {
        // Aceita preço no formato brasileiro (12,50) ou com ponto (12.50)
        $preco = str_replace(',', '.', trim($_POST['preco']));

        return [
            'nome'      => trim($_POST['nome']),
            'categoria' => trim($_POST['categoria']),
            'preco'     => (float)$preco,
            'estoque'   => (int)$_POST['estoque']
        ];
    }

    public function index() {
        $produtos = $this->model->all();
        require_once __DIR__ . '/../views/produtos/index.php';
    }

    public function cadastrar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $this->model->insert($this->dadosDoFormulario());
                header('Location: index.php?controller=produto&action=index');
                exit;
            } catch (PDOException $e) {
                $erro = 'Não foi possível cadastrar o produto.';
            }
        }
        require_once __DIR__ . '/../views/produtos/cadastrar.php';
    }

    public function editar() {
        $id = $_GET['id'] ?? null;
        if (!$id) die("ID não fornecido.");

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $this->model->update($id, $this->dadosDoFormulario());
                header('Location: index.php?controller=produto&action=index');
                exit;
            } catch (PDOException $e) {
                $erro = 'Não foi possível salvar as alterações.';
            }
        }

        $produto = $this->model->find($id);
        if (!$produto) {
            header('Location: index.php?controller=produto&action=index');
            exit;
        }
        require_once __DIR__ . '/../views/produtos/editar.php';
    }

    public function excluir() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->model->delete($id);
        }
        header('Location: index.php?controller=produto&action=index');
        exit;
    }
}

?>
