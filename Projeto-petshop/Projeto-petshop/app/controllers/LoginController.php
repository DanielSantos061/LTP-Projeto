
<?php

require_once __DIR__ . '/../models/Usuario.php';

class LoginController {

    private $model;

    // Construtor
    public function __construct() {

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->model = new Usuario();
    }

    // Exibir tela de login
    public function index() {

        if (isset($_SESSION['usuario_id'])) {
            header('Location: index.php?controller=painel&action=index');
            exit;
        }

        require_once __DIR__ . '/../views/Login/index.php';
    }

    // Realizar login
    public function logar() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $login = $_POST['login'] ?? '';
            $senha = $_POST['senha'] ?? '';

            $db = Database::getConnection();

            $stmt = $db->prepare(
                "SELECT * FROM tbl_usuario WHERE login = :login"
            );

            $stmt->execute([
                'login' => $login
            ]);

            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario && password_verify($senha, $usuario['senha'])) {

                session_regenerate_id(true);

                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nome'] = $usuario['nome'];
                $_SESSION['usuario_perfil'] = $usuario['perfil'];

                header('Location: index.php?controller=painel&action=index');
                exit;

            } else {

                $erro = "Login ou senha incorretos!";

                require_once __DIR__ . '/../views/Login/index.php';
            }
        }
    }

    // Encerrar sessão
    public function sair() {

        if (session_status() === PHP_SESSION_ACTIVE) {
            session_unset();
            session_destroy();
        }

        header('Location: index.php?controller=Login&action=index');
        exit;
    }

}
?>
