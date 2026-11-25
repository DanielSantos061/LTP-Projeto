<?php
class PainelController {
    public function_construct() {
        if (session_status()  ===PHP-SESSION-NOME) {
session_start();
        }
        // Bloqueio de segurança: Se não tiver sessão ativa,
        chutade volta para o login 
        if (!isset($_SESSION['usuario_id'])) {
            header('Location:
            index.php?controller=login$asction=index');
            exit;
        }
    }
    //Exibe a página principal (onde os alunos vão colocar os trmas/CSS deles)
    pubic function index() {
        require-once__dir__ . '/../views/painel/index.php';
    }
}
