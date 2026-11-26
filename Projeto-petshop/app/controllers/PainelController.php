<?php
class PainelController {

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['usuario_id'])) {
            header('Location: index.php?controller=login&action=index');
            exit;
        }
    }

    public function index() {
        require_once __DIR__ . '/../views/painel/index.php';
    }
}
